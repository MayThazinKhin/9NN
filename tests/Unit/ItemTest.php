<?php

namespace Tests\Unit;
use Tests\TestCase;

class ItemTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testItemCategories()
    {
        $response = $this->post('api/categories',['type'=>'shop']);
        $response->assertStatus(200)
        ->assertJson([]);
    }

    public function testItems()
    {
        $response = $this->post('api/items',['category_id'=>1]);
        $response->assertStatus(200);
    }
}
