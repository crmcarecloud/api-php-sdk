<?php
/**
 * Get all booking tickets
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
$customer_id = null; // string | The unique id of the customer (optional)
$valid_from = null; // string | Date and time from when is record already valid. (YYYY-MM-DD HH:MM:SS) (optional)
$valid_to = null; // string | Date and time till when is record still valid. (YYYY-MM-DD HH:MM:SS) (optional)
$valid_only = null; // boolean | true - returns only records valid in current moment / false - returns all records of the resource without time validation (optional)
$booking_ticket_property_id = null; // string | Booking ticket property id from resource booking-ticket-properties (optional)
$booking_ticket_property_value = null; // Booking ticket property record value from booking-ticket-properties in case of datatype with multiple values (optional)

// Call endpoint and get data
try {
    $get_booking_tickets = $care_cloud->bookingTicketsApi()->getBookingTickets(
        $accept_language,
        $count,
        $offset,
        $sort_field,
        $sort_direction,
        $customer_id,
        $valid_from,
        $valid_to,
        $valid_only,
        $booking_ticket_property_id,
        $booking_ticket_property_value
    );
    $booking_tickets = $get_booking_tickets->getData()->getBookingTickets();
    $total_items = $get_booking_tickets->getData()->getTotalItems();
    var_dump($booking_tickets);
    var_dump($total_items);
} catch (ApiException $e) {
    var_dump($e->getResponseBody() ?: $e->getMessage());
    die();
}