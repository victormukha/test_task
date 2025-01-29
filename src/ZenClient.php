<?php

namespace ZenSdk;

use GuzzleHttp\Client;
use ZenSdk\Exceptions\ZenException;
use ZenSdk\Exceptions\ZenApiException;

class ZenClient {
    private $client;
    private $apiKey;
    private $baseUrl;

    public function __construct(string $apiKey, bool $sandbox = true) {
        $this->apiKey = $apiKey;
        $this->baseUrl = $sandbox ? 'https://sandbox.zen.com/api/v1/' : 'https://api.zen.com/v1/';
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
            ],
        ]);
    }

    public function request(string $method, string $uri, array $data = []) {
        try {
            $response = $this->client->request($method, $uri, $data);
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            throw new ZenApiException($e->getMessage(), $e->getCode(), $e);
        }
    }
}