<?php

namespace ZenSdk\Tests;

use ZenSdk\ZenClient;
use PHPUnit\Framework\TestCase;

class ZenClientTest extends TestCase {
    public function testCreatePayment() {
        $client = new ZenClient('your_api_key_here', true);
        $payment = new \ZenSdk\Payment($client);

        $data = [
            'amount' => 1000,
            'currency' => 'USD',
            'description' => 'Test payment',
        ];

        $response = $payment->create($data);
        $this->assertArrayHasKey('id', $response);
    }
}
