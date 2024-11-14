<?php
namespace App\Services;

use App\Contracts\ApiInterface;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class CoinGeckoService implements ApiInterface
{
    private PendingRequest $api;

    public function __construct()
    {
        $this->api = Http::baseUrl(config('services.coinGecko.url'))
            ->withHeaders([
                'x-cg-demo-api-key' => config('services.coinGecko.token'),
                'accept' => 'application/json'
            ]);
    }

    public function listCriptos()
    {
        $response = $this->api->get('/coins/list');

        return $response->ok() ? $response->json() : null;
    }
}
