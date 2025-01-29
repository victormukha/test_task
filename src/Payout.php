<?php

namespace ZenSdk;

class Payout {
    private $client;

    public function __construct(ZenClient $client) {
        $this->client = $client;
    }

    public function create(array $data) {
        return $this->client->request('POST', 'payouts', ['json' => $data]);
    }
}
