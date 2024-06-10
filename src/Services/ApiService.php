<?php

namespace App\Services;

use Symfony\Contracts\HttpClient\HttpClientInterface;
class ApiService
{
    public function __construct(
        private HttpClientInterface $client,
    ) {
    }
    public function test()
    {

        $response = $this->client->request(
            'GET',
            'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest',
            ['headers' => [
                'Accepts' => 'application/json',
                'X-CMC_PRO_API_KEY' => '8d913e0c-a56a-45ab-af82-baf5989789fa'
            ],],
        );

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]
//        dd($content["data"][0]);
        return $content["data"];
    }
}