<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecentSearch extends Model
{
    protected $fillable = ['name', 'searches'];

    /**
     * Updates or adds 
     * Uses OSRS class to crawl OSRS site, and return stats as Object.
     *
     * @param String player username
     */
    static function insertOrUpdateRecentSearch($username)
    {
        $check_username = RecentSearch::where('name', $username)->first();

        // update if exists
        if($check_username){
            RecentSearch::where('name', $username)
                ->update([
                    'searches' => ++$check_username->searches
                ]);

        // else add
        } else {
            RecentSearch::create([
                'name' => $username
            ]);
        }
    }
}