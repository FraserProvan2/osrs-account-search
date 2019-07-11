<?php

use Illuminate\Database\Seeder;

class RecentSearchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seed_accounts = array(
            ['name' => 'krun64', 'searches' => 1],
            ['name' => 'kermit', 'searches' => 2],
            ['name' => 'john', 'searches' => 23],
            ['name' => 'lion', 'searches' => 34],
            ['name' => 'helen', 'searches' => 1],
            ['name' => 'gamecube', 'searches' => 1],
            ['name' => 'frosty', 'searches' => 2],
            ['name' => 'axe', 'searches' => 5],
            ['name' => 'gameboy', 'searches' => 1],
            ['name' => 'sandwich', 'searches' => 1],
            ['name' => 'rrrpR', 'searches' => 3],
            ['name' => 'Plant', 'searches' => 1],
            ['name' => 'Jelly Sucks', 'searches' => 4],
            ['name' => 'jelly', 'searches' => 1],
            ['name' => 'smiithy', 'searches' => 2],
            ['name' => 'Number1 Bass', 'searches' => 1],
            ['name' => 'Lynx Titan', 'searches' => 99],
        );

        foreach($seed_accounts as $account) {
            \App\RecentSearch::insert([
                'name' => $account['name'], 
                'searches' => $account['searches'],
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ]);
        }
    }
}

