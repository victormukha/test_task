<?php

namespace ZenSdk;

class Payment {
    private $client;

    public function __construct(ZenClient $client) {
        $this->client = $client;
    }

    public function create(array $data) {
        return $this->client->request('POST', 'payments', ['json' => $data]);
    }

    public function getStatus(string $paymentId) {
        return $this->client->request('GET', "payments/{$paymentId}");
    }
}