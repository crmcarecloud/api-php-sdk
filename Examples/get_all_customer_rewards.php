<?php
/**
 * Get all customer rewards
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

// Set path parameter
$customer_id = '8ea2591121e636086a4a9c0992'; // string | The unique id of the customer

// Set query parameters
$count = 10; // integer >= 1 | The number of records to return (optional, default is 100)
$offset = 0; // integer | The number of records from a collection to skip (optional, default is 0)
$sort_field = null; // string | One of the query string parameters for sorting (optional, default is null)
$sort_direction = 'DESC'; // string | Direction of sorting the response list (optional, default is null)
$name = null; // string | Search record by name or a part of the name (optional, default is null)
$store_id = null; // string | The unique id of the store where customer can apply the reward (optional, default is null)
$is_valid = null; // boolean | In validity range - true / before or after validity range - false / no value - all (optional, default is null)
$valid_from = null; // string | Date from when is record already valid (YYYY-MM-DD) (optional, default is null)
$valid_to = null; // string | Date to when is record still valid (YYYY-MM-DD) (optional, default is null)
$code = null; // string | The code of the reward (optional, default is null)
$is_automated = null; // boolean | Possible values: true - returns all automated rewards / false - returns all nonautomated rewards / no value - all rewards (optional)
$reward_group = null; // integer | Possible values: 0 - cash desk reward (party time reward) / 1 - catalog reward / 2 - campaign reward / 4 - simple reward (optional)
$customer_type_id = null; // string[] | Select by list of customer types from customer-types resource. Logic OR is used between values (optional)
$without_stores = null; // boolean | If true, the data will not contain information about business units (stores). If false, or not set resource returns default structure (optional)
$tag_ids = null; // string[] | Parameter filters values by a list of tag ids. Logic OR is used between values (optional)

// Call endpoint and get data
try {
    $get_rewards = $care_cloud->customersApi()->getSubCustomerRewards(
        $customer_id,
        $accept_language,
        $count,
        $offset,
        $sort_field,
        $sort_direction,
        $name,
        $store_id,
        $is_valid,
        $valid_from,
        $valid_to,
        $code,
        $is_automated,
        $reward_group,
        $customer_type_id,
        $without_stores,
        $tag_ids
    );
    $rewards = $get_rewards->getData()->getRewards();
    $total_items = $get_rewards->getData()->getTotalItems();
    var_dump($rewards);
    var_dump($total_items);
} catch (ApiException $e) {
    var_dump($e->getResponseBody() ?: $e->getMessage());
    die();
}