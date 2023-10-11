<?php

namespace SmsBase\Tests\Feature;

use Illuminate\Support\Facades\Http;
use SmsBase\SmsApi;
use Orchestra\Testbench\TestCase;

class SmsApiTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [\SmsApi\SmsApiServiceProvider::class];
    }

    /** @test */
    public function it_can_send_message_via_get()
    {
        Http::fake([
            '*' => Http::response(['success' => true], 200)
        ]);

        $smsApi = new SmsApi;

        $response = $smsApi->sendMessageViaGet('995595079020', 'wifisher', 'test message');

        $this->assertTrue($response['success']);
    }

    // Add more tests for other methods...
}
