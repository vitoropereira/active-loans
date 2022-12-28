<?php

namespace Tests\Feature;

use App\Models\LendingOpenPosition;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GraphicsDataControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function itListsActiveData()
    {
        $active = LendingOpenPosition::factory(3)->create();

        $activeResponse = $this->get("/api/active/{$active[0]->TckrSymb}");
        $response = $activeResponse->json();

        $activeResponse->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonStructure(['data'])
            ->assertJsonStructure(['data' => ['*' => ['RptDt']]]);

        $this->assertEquals($response['data'][0]['TckrSymb'], $active[0]->TckrSymb);
    }
}
