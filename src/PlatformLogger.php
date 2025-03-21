<?php

namespace Vietnix\PlatformVendor;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class PlatformLogger
{
  private string $endpoint;
  private string $apiKey;
  private Client $client;

  public function __construct(string $endpoint, string $apiKey)
  {
    $this->endpoint = $endpoint;
    $this->apiKey = $apiKey;
    $this->client = new Client();
  }

  /*
    level: {URGENT = 1,ERROR = 2,DEBUG = 3,WARN = 4,INFO = 5}
  */
  public function sendLog(string $message, int $level = 3, array $meta = []): bool
  {
    $payload = [
      'message' => $message,
      'level' => $level,
      'meta' => json_encode($meta),
    ];

    try {
      $response = $this->client->post($this->endpoint . '/logs', [
        'headers' => [
          'api-key' => $this->apiKey,
          'Content-Type' => 'application/json',
        ],
        'json' => $payload,
      ]);

      return $response->getStatusCode() === 200 || $response->getStatusCode() === 201;
    } catch (RequestException $e) {
      error_log($e->getMessage());
      return false;
    }
  }
}