<?php

namespace Tests\Coin;

use App\Http\Controllers\CoinController;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;
use Illuminate\Http\Request;

class CoinTest extends TestCase
{
    private $coin = [
        'id' => 581,
        'coinName' => '1942 S'
    ];

    protected CoinController $controller;

    protected Request $request;

    public function setUp(): void
    {
        parent::setUp();
        $this->controller  = new CoinController();
        $this->request = new Request;
    }

    /**
     * Main coin by ID Page.
     *
     * @return void
     */
    public function testGetCoinByID()
    {
        $response = $this->post('api/coins/view', ['id' => $this->coin['id']]);
        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->where('coin.info.0.id', $this->coin['id'])
                ->where('coin.info.0.coinName', $this->coin['coinName'])
                ->etc()
            );
        $this->assertEquals(200, $response->getStatusCode());
    }
}
