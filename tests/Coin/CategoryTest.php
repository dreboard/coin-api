<?php

namespace Tests\Coin;

use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    private $coin = [
        'id' => 83,
        'category' => 'Small Cent'
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
    public function testGetCategoryByID()
    {
        $response = $this->post('api/category/view', ['id' => $this->coin['id']]);
        //$response = $this->get('api/category/view/'.$this->coin['id']);
        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->where('category.0.id', $this->coin['id'])
                ->where('category.0.coinCategory', $this->coin['category'])
                ->etc()
            );
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Category by ID Page.
     *
     * @return void
     */
    public function testFailCategoryByID()
    {
        $response = $this->post('api/category/view', ['id' => 222]);
        $response
            ->assertJson(fn (AssertableJson $json) =>
            $json->where('error', 'Category not found')
            );
        $this->assertEquals(200, $response->getStatusCode());
    }
}
