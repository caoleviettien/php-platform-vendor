<?php

require __DIR__ . '/vendor/autoload.php';

use Vietnix\PlatformVendor\PlatformLogger;

$endpoint = 'https://';
$apiKey = '***';

$logger = new PlatformLogger($endpoint, $apiKey);

$result = $logger->sendLog('Test log from my package', 3, ['filename' => 'test.php']);

if ($result) {
    echo "Log sent successfully!";
} else {
    echo "Failed to send log.";
}