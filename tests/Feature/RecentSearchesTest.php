<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RecentSearchesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function search_adds_as_expected()
    {
        $this->get('/player_stats/krun64');

        $this->assertDatabaseHas('recent_searches', ['name' => 'krun64']);
    }

    /** @test */
    public function search_amount_updates_as_expected()
    {
        $this->get('/player_stats/kermit');
        $this->get('/player_stats/kermit');

        $this->assertDatabaseHas('recent_searches', [
            'name' => 'kermit',
            'searches' => 2,
        ]);
    }
}
