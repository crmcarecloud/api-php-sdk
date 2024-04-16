<?php

use CrmCareCloud\Webservice\RestApi\Client\ApiException;
use CrmCareCloud\Webservice\RestApi\Client\SDK\Config;
use CrmCareCloud\Webservice\RestApi\Client\SDK\CareCloud;

require_once '../vendor/autoload.php';
require_once 'config.php';

$config = new Config($projectUri, $login, $password, $externalAppId, $authType);
$careCloud = new CareCloud($config);

try {
    // Get sales turnover
    $salesTurnover = $careCloud->walletApi()->getWalletSalesTurnover('8bed991c68a470e7aaeffbf048');
    $items = $salesTurnover->getData()->getTurnover();
} catch (ApiException $e) {
    var_dump($e->getResponseBody());
    die();
}
