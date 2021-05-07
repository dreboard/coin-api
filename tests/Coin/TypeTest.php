<?php

namespace Tests\Coin;

use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class TypeTest extends TestCase
{
    private $coin = [
        'id' => 2,
        'type' => 'Lincoln Wheat'
    ];

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Category by ID Page.
     *
     * @return void
     */
    public function testGetTypeByID()
    {
        $response = $this->post('api/type/view', ['id' => $this->coin['id']]);
        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->where('typeInfo.0.id', $this->coin['id'])
                ->where('typeInfo.0.coinType', $this->coin['type'])
                ->etc()
            );
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Category by ID Page.
     *
     * @return void
     */
    public function testFailTypeByID()
    {
        $response = $this->post('api/type/view', ['id' => 222]);
        $response
            ->assertJson(fn (AssertableJson $json) =>
                $json->where('error', 'Type not found')
            );
        $this->assertEquals(200, $response->getStatusCode());
    }
}
