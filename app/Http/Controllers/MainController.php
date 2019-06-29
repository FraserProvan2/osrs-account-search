<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\OSRS_player_stats;

class MainController extends Controller
{
    /** */ 
    public function index()
    {
        return view('home', [
            'player_stats' => $this->get_player_stats('krun64'),
        ]);
    }

    /** */ 
    public function get_player_stats($username)
    {
        // search DB first
            // add player to db if not checked exists
        
        
        return OSRS_player_stats::get_player_stats($username);
    }

    /** */ 
    public function get_recent_searches()
    {
        //
    }
}
