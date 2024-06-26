<?php
/**
 * Create a batch of products
 */

use CrmCareCloud\Webservice\RestApi\Client\ApiException;
use CrmCareCloud\Webservice\RestApi\Client\Model\PluId;
use CrmCareCloud\Webservice\RestApi\Client\Model\ProductBatch;
use CrmCareCloud\Webservice\RestApi\Client\Model\ProductsBatchBody;
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

// Set products info
$plu_id = new PluId();
$plu_id->setListCode('GLOBAL'); // string | Code of the particular product list (“GLOBAL”, “SKU”, “PLU”, etc.)
$plu_id->setCode('abc123'); // string | Code of product from the product list

$product1 = new ProductBatch();
$product1->setName('Apple Clock'); // strong | The name of the product
$product1->setCode(null); // string | The code of the product (optional)
$product1->setPluIds([$plu_id]); // array of PluId objects
$product1->setProductGroupId(null); // string | The unique id of the product group (optional)
$product1->setProductGroupExternalId(null); // string | The unique external id of the product group (optional)
$product1->setProductBrandId(null); // string | The unique id of the product brand (optional)
$product1->setProductBrandExternalId(null); // string | The unique external id of the product brand (optional)
$product1->setStoreId(null); // string | The unique id for the store where the product group is valid (optional)

// Set the request body
$body = new ProductsBatchBody();
$body->setProducts([$product1]);

// Call endpoint and post data
try {
    $care_cloud->productsApi()->postBulkProducts($body, $accept_language);
} catch (ApiException $e) {
    var_dump($e->getResponseBody() ?: $e->getMessage());
    die();
}