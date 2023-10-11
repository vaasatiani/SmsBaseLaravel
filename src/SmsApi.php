<?php

namespace SmsBase;

use Illuminate\Support\Facades\Http;

class SmsApi
{

    protected $baseUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('smsbase.base_url');
        $this->apiKey = config('smsbase.api_key');
    }

    public function sendMessageViaGet($to, $from, $content)
    {
        $response = Http::get($this->baseUrl . 'send', [
            'to' => $to,
            'from' => $from,
            'content' => $content,
            'api-key' => $this->apiKey
        ]);

        return $response->json();
    }

    public function sendMessageViaPost($to, $from, $content)
    {
        $response = Http::post($this->baseUrl . 'send', [
            'to' => $to,
            'from' => $from,
            'content' => $content,
            'api-key' => $this->apiKey
        ]);

        return $response->json();
    }

}
