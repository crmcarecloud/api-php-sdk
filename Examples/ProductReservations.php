<?php

use CrmCareCloud\Webservice\RestApi\Client\ApiException;
use CrmCareCloud\Webservice\RestApi\Client\SDK\Config;
use CrmCareCloud\Webservice\RestApi\Client\SDK\CareCloud;

require_once '../vendor/autoload.php';
require_once 'config.php';

$config = new Config($projectUri, $login, $password, $externalAppId, $authType);
$careCloud = new CareCloud($config);

try {
    // Get all product reservations
    $productReservations = $careCloud->productReservationsApi()->getProductReservations();
    $items = $productReservations->getData()->getProductReservations();
    $totalItems = $productReservations->getData()->getTotalItems();
} catch (ApiException $e) {
    var_dump($e->getResponseBody());
    die();
}
