<?php
/**
 * Get all users
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

// Set query parameters
$count = 10; // integer >= 1 | The number of records to return (optional, default is 100)
$offset = 0; // integer | The number of records from a collection to skip (optional, default is 0)
$sort_field = null; // string | One of the query string parameters for sorting (optional, default is null)
$sort_direction = 'DESC'; // string | Direction of sorting the response list (optional, default is null)
$email = null; // string | Search by email (optional)
$phone = null; // string | Search by phone number with international prefix (optional)
$login = null; // string | Search by login (optional)
$first_name = null; // string | Search by first name (optional)
$last_name = null; // string | Search by last name (optional)

// Call endpoint and get data
try {
    $get_users = $care_cloud->usersApi()->getUsers(
        $accept_language,
        $count,
        $offset,
        $sort_field,
        $sort_direction,
        $email,
        $phone,
        $login,
        $first_name,
        $last_name
    );
    $users = $get_users->getData()->getUsers();
    $total_items = $get_users->getData()->getTotalItems();
    var_dump($users);
    var_dump($total_items);
} catch (ApiException $e) {
    var_dump($e->getResponseBody() ?: $e->getMessage());
    die();
}