<?php

namespace Tests\Coin;

use App\Http\Controllers\CoinVarietyController;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;
use Illuminate\Http\Request;

class CoinVarietyTest extends TestCase
{
    private $coin = [
        'coin_id' => 3664,
        'variety_id' => 12,
        'sub_type' => 'Plain',
        'variety' => 'Doubled Die Reverse',
        "label" => "DDR-001",
        "designation" => "1-R-II-C"
    ];

    protected CoinVarietyController $controller;

    protected Request $request;

    public function setUp(): void
    {
        parent::setUp();
        $this->controller  = new CoinVarietyController();
        $this->request = new Request;
    }

    /**
     * Get variety by ID.
     *
     * @return void
     */
    public function testGetVarietyByID()
    {
        $response = $this->post('api/coins/varietyId', ['variety_id' => 12]);
        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->where('coin.info.0.id', $this->coin['variety_id'])
                ->where('coin.info.0.variety', $this->coin['variety'])
                ->where('coin.info.0.label', $this->coin['label'])
                ->etc()
            );
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Get all of a variety by coin id.
     * @example (all 1909P Doubled Die Reverse coins)
     * @return void
     */
    public function testGetVarietyByName()
    {
        $response = $this->post('api/coins/varietyType', [
            'coin_id' => 3664, //$this->coin['coin_id'],
            'variety' => "Doubled Die Reverse" //$this->coin['variety']
        ]);
        $data = $response->getOriginalContent();
        $this->assertEquals("Doubled Die Reverse", $data['varietyList'][0]->variety);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
