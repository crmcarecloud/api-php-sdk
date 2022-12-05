<?php
/**
 * Get a collection of store group records
 */

use CrmCareCloud\Webservice\RestApi\Client\ApiException;
use CrmCareCloud\Webservice\RestApi\Client\SDK\CareCloud;
use CrmCareCloud\Webservice\RestApi\Client\SDK\Config;
use CrmCareCloud\Webservice\RestApi\Client\SDK\Data\AuthTypes;

require_once '../vendor/autoload.php';

$project_uri = 'https://yourapiurl.com/webservice/rest-api/enterprise-interface/v1.0';
$login = 'login';
$password = 'password';
$external_app_id = 'application_id';
$auth_type = AuthTypes::BEARER_AUTH;

$config = new Config($project_uri, $login, $password, $external_app_id, $auth_type);

$care_cloud = new CareCloud($config);

// Set Header parameter Accept-Language
$accept_language = 'en'; //	string | The unique id of the language code by ISO 639-1 Default: cs, en-gb;q=0.8

// Set path parameters
$store_id = '8bed991c68a470e7aaeffbf048'; // string | The unique id of the store

// Call endpoint and get data
try
{
    $get_store_groups = $care_cloud->storesApi()->getSubStoreGroups($store_id, $accept_language);
    $store_groups = $get_store_groups->getData()->getStoreGroupRecords();
    var_dump($store_proups);
    $total_items = $get_store_groups->getData()->getTotalItems();
    var_dump($total_items);
}
catch(ApiException $e)
{
    die(var_dump($e->getResponseBody() ?: $e->getMessage()));
}