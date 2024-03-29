<?php
/**
 * *Edit a push token
 */

use CrmCareCloud\Webservice\RestApi\Client\ApiException;
use CrmCareCloud\Webservice\RestApi\Client\Model\Setup;
use CrmCareCloud\Webservice\RestApi\Client\Model\TokensTokenIdBody;
use CrmCareCloud\Webservice\RestApi\Client\SDK\CareCloud;
use CrmCareCloud\Webservice\RestApi\Client\SDK\Config;
use CrmCareCloud\Webservice\RestApi\Client\SDK\Data\AuthTypes;
use CrmCareCloud\Webservice\RestApi\Client\SDK\Data\Interfaces;

require_once '../vendor/autoload.php';

$project_uri = 'https://yourapiurl.com/webservice/rest-api/customer-interface/v1.0';
$login = 'login';
$password = 'password';
$external_app_id = 'application_id';
$auth_type = AuthTypes::BASIC_AUTH;
$interface = Interfaces::CUSTOMER;
$token = 'BASE64_encoded_string_user_name';

$config = new Config($project_uri, $login, $password, $external_app_id, $auth_type, $interface, null, $token);

$care_cloud = new CareCloud($config);

// Set Header parameter Accept-Language
$accept_language = 'en'; //	string | The unique id of the language code by ISO 639-1 Default: cs, en-gb;q=0.8

// Set the setup info
$setup = new Setup();
$setup->setLanguageId('en'); // string | The unique id of the language by ISO 639-1 code from languages resource
$setup->setAllowedGps(false); // boolean | Permission to GPS tracking in the mobile application
$setup->setAllowedNotifications(false); // boolean | Permission to the mobile application's notifications

// Set path parameters
$token_id = '702baa4a40a57694831321e5d02605d46c189369126ae43a81030790ea188af87e49578a'; // Client's application token

// Set the request body
$body = new TokensTokenIdBody();
$body->setSetup($setup);
$body->setPushToken('321e5d02605d46c18936912'); // string | Push notification token (Apple or Google) (optional)

// Call endpoint and put data
try {
    $care_cloud->tokensApi()->putToken($body, $token_id, $accept_language);
} catch (ApiException $e) {
    var_dump($e->getResponseBody() ?: $e->getMessage());
    die();
}