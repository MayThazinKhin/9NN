<?php

namespace Tests\Unit;

use Tests\TestCase;

class SellItemTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSellItems()
    {
        $response = $this->post('api/sell_items');
        $response->assertStatus(200);
    }
}
