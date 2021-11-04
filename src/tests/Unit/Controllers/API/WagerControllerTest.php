<?php

namespace Tests\Unit\Controllers\API;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WagerControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test create wager
     *
     * @return void
     */
    public function testGetDevicesSuccess()
    {
        $response = $this->json('POST', 'api/device', [
            "total_wager_value" => 10,
            "odds" => 1,
            "selling_percentage" => 10,
            "selling_price" => 0.1
        ]);
        $expect_response_success_struct = [
            'id',
            'total_wager_value',
            'odds',
            'selling_percentage',
            'selling_price',
            'current_selling_price',
            'percentage_sold',
            'amount_sold',
            'placed_at',
        ];

        $response->assertStatus(200)
            ->assertJsonStructure($expect_response_success_struct);
    }

//    /**
//     * Test get devices in case fail
//     *
//     * @return void
//     */
//    public function testGetDevicesFail()
//    {
//        $response = $this->json('GET', 'api/device', ['created_at' => '123']);
//        $expect_response_success_struct = [
//            'response_code',
//            'error'
//        ];
//
//        $response->assertJsonStructure($expect_response_success_struct);
//    }
}
