<?php
require "bootstrap.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type");

use Service\Purchase;

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

if ($_SERVER["REQUEST_METHOD"] !== 'GET') {
    header('HTTP/1.1 405 Method Not Allowed');
    exit;
}

if ($uri[1] !== 'question' || !isset($uri[2])) {
    header('HTTP/1.1 404 Not Found');
    exit;
}

try {
    $purchase = Purchase::makePurchase();
    $response = [];

    switch ($uri[2]) {
        case '01':
            $totalPricing = 0;
            $sortedItems = $purchase->getSortedItems('price');
            Purchase::calculateTotalPrice($sortedItems, $totalPricing);
            $totalPricing = number_format($totalPricing, 2);

            $response = [
                'status_code' => 'HTTP/1.1 200 OK',
                'body' => json_encode([
                    'Total Pricing' => $totalPricing
                ])
            ];
            break;

        case '02':
            $totalConsole = 0;
            $console = $purchase->getItemsByType('console');
            Purchase::calculateTotalPrice($console, $totalConsole);
            $totalConsole = number_format($totalConsole, 2);

            $response = [
                'status_code' => 'HTTP/1.1 200 OK',
                'body' => json_encode([
                    'Total Console' => $totalConsole
                ])
            ];
            break;

        default:
            header('HTTP/1.1 404 Not Found');
            exit;
    }

} catch (Exception $e) {
    $response = [
        'status_code' => 'HTTP/1.1 500 Internal Server Error',
        'body' => json_encode(['error' => $e->getMessage()])
    ];
}

header($response['status_code']);
echo $response['body'];
