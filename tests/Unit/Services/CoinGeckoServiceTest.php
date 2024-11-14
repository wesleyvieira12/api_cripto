<?php

use App\Services\CoinGeckoService;

test("Buscar lista de criptomoedas corretamente", function(){
    $service = new CoinGeckoService();
    $response = $service->listCriptos();
    expect($response)->not->toBeNull();
    expect($response[0])->toHaveKeys(['id', 'symbol', 'name']);
});