<?php
/**
 * Transfer points
 */

use CrmCareCloud\Webservice\RestApi\Client\ApiException;
use CrmCareCloud\Webservice\RestApi\Client\Model\ActionsTransferpointsBody;
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

// Set the request body
$body = new ActionsTransferpointsBody();
$body->setAmount(100); // float | Number of transferred points
$body->setOriginalCustomerId('8ea2591121e636086a4a9c0992'); // string | The unique id of the original point's holder
$body->setNewCustomerId('88a1b431227d2172d60285b4e1'); // string | The unique id of the new point's holder
$body->setPointTypeId('8adcb83164fa7e12668035d43e'); // string | Type of the transferred points

// Call endpoint and post data
try {
    $care_cloud->pointsApi()->postPointsTransfer($body, $accept_language);
} catch (ApiException $e) {
    var_dump($e->getResponseBody() ?: $e->getMessage());
    die();
}