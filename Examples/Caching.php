<?php

use CrmCareCloud\Webservice\RestApi\Client\ApiException;
use CrmCareCloud\Webservice\RestApi\Client\SDK\Cache\Cache;
use CrmCareCloud\Webservice\RestApi\Client\SDK\Cache\Rule;
use CrmCareCloud\Webservice\RestApi\Client\SDK\Config;
use CrmCareCloud\Webservice\RestApi\Client\SDK\CareCloud;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

require_once '../vendor/autoload.php';
require_once 'config.php';

$config = new Config($projectUri, $login, $password, $externalAppId, $authType);

$cache_rules = [
    new Rule(Rule::REQUEST_TYPE_GET, 'agreements', 400),
];
$cache = new Cache(
    new FilesystemAdapter('testCache', 0, __DIR__),
    $cache_rules
);

$careCloud = new CareCloud($config, $cache);

try {
    // Get all agreements
    $agreements = $careCloud->agreementsApi()->getAgreements();
    $items = $agreements->getData()->getAgreements();
} catch (ApiException $e) {
    var_dump($e->getResponseBody());
    die();
}
