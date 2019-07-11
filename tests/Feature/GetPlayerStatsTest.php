<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GetPlayerStatsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function ensure_stats_are_returned()
    {
        $this->get("/player_stats/krun64")
            ->assertJson([
                "status" => "success",
                "body" => [
                    "username" => "krun64",
                    "stats" => [
                        "splices" => [],
                        "overall" => []
                    ]
                ]
            ]);
    }

    /** @test */
    public function ensure_expected_error_for_invalid_accounts()
    {
        $this->get("/player_stats/invalidaccountname")
            ->assertJson([
                "status" => "error",
                "body" => [
                    "message" => "Player invalidaccountname not found"
                ]
            ]);
    }
}
