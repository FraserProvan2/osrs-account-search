<?php

namespace App;

/* 
 * OSRS Player Stats Getter
 * 
 * This class crawls OSRS high scores for accounts and turns the HTTP response
 * into a JSON object.
 * 
 * Fraser Provan <github.com/FraserProvan2>
 * 
 * Usage
 * Call static method get_player_stats to fetch player stats
 * e.g. OSRS_player_stats::get_player_stats('AccountUsername')
 */

class OSRS_player_stats {
    
    /**
     * Get players OSRS stats
     *
     * @param String username
     * @return Json players stats
     */
    public static function get_player_stats($username)
    {
        // get users stats
        $fetched_stats = OSRS_player_stats::get_stats_raw($username);

        // catch if player doesnt exist
        if (!$fetched_stats) {
            return array(
                'status' => 'error',
                'body' => [
                    'message' => 'Player ' . $username . ' not found.'
                ]
            );
        } else {
            //process fetched stats
            $player_stats = OSRS_player_stats::process_stats($fetched_stats);
        }

        return array(
            'status' => 'success',
            'body' => [
                'username' => $username,
                'stats' => $player_stats,
            ]
        );
    }

    /*-------------------------------------------------------------------------
    |  Crawling Processing methods.
    |--------------------------------------------------------------------------*/

    /**
     * Get raw stats from HiScore Page, parses into Array
     *
     * @param String URL for request
     * @return Array User Stats
     */
    public static function get_stats_raw($raw_username)
    {
        // call using username
        $username = str_replace(' ', '%20', $raw_username);

        // source code from get request
        $response = curl_request("https://secure.runescape.com/m=hiscore_oldschool/hiscorepersonal.ws?user1={$username}", false, true);

        // Trim 1: Tags Removed
        $response = strip_tags($response);
        
        // Trim 2: Remove everything above stats table
        $exploded_response = explode('SkillRankLevelXP', $response);
        
        // Catch if Trim 2 failed
        if (isset($exploded_response[1])) {
            $response = $exploded_response[1];
            
            // Trim 3: Remove everything under stats table
            $exploded_response = explode('Minigame', $response);
            $response = $exploded_response[0];
            
            // Trim 4: Explode by new line
            $exploded_response = explode(PHP_EOL, $response);
            
            // Trim 5: Remove empty arrays
            $filtered_response = array_filter($exploded_response);
            
            // Reorder and return player stats array
            return reindex_array($filtered_response);
        }
        
        // Return empty array to imply no player was found
        return array();
    }

    /**
     * Proccess Raw Stats array into data object
     *
     * @param Array Player Stats
     * @return Array Player Stats data object
     */
    public static function process_stats($raw_stats)
    {
        // declartions
        $stats = array();
        $list_of_stats = array();
        $no_xp_stats = array();
        $all_stats = array('Attack', 'Defence', 'Strength', 'Hitpoints', 'Ranged', 'Prayer', 'Magic', 'Cooking', 'Woodcutting', 'Fletching', 'Fishing', 'Firemaking', 'Crafting', 'Smithing', 'Mining', 'Herblore', 'Agility', 'Thieving', 'Slayer', 'Farming', 'Runecraft', 'Hunter', 'Construction');
        
        // process stats
        foreach ($raw_stats as $key => $stat) {
            if (!check_for_int($stat)) {
                $stats[$stat] = [
                    'Rank' => string_to_int($raw_stats[$key + 1]),
                    'Level' => string_to_int($raw_stats[$key + 2]),
                    'XP' => string_to_int($raw_stats[$key + 3]),
                ];
                
                // push stat name to array
                array_push($list_of_stats, $stat);
            }
        }
        
        // process stats that are 0 xp
        foreach ($all_stats as $key => $stat) {
            if (!in_array($stat, $list_of_stats)) {
                $stats[$stat] = [
                    'Rank' => null,
                    'Level' => 0,
                    'XP' => 0,
                ];
            }
        }

        return $stats;
    }
}

/*-------------------------------------------------------------------------
|  Utility methods.
|--------------------------------------------------------------------------*/

/**
 * Curl request function
 * 
 * @param String URL for request
 * @param Array headers
 * @param Boolean Toggle return transfer
 * @return Collection response
 */
function curl_request($url, $headers = false, $returntransfer = false) 
{
    // creats curl request
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    
    // config
    if($returntransfer == true) curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    if($headers == true) curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
    // gets curl response
    $response = curl_exec($curl);
    curl_close ($curl);
    
    return $response;
}

/**
 * Reindexes array
 * 
 * @param Array
 * @return Array reindexed
 */
function reindex_array($array)
{
    return array_values(array_filter($array));
}

/**
 * Checks if value start with int or not
 * 
 * @param String value to check
 * @return Boolean whether the value is an Int
 */
function check_for_int($string) 
{
    $length = strlen($string);   
    for ($i = 0, $int = ''; $i < $length; $i++) {
    if (is_numeric($string[$i]))
        $int .= $string[$i];
    else break;
    }

    return (int) $int;
}

/**
 * Converts string into In
 * 
 * @param String value
 * @return Int String value
 */
function string_to_int($string)
{
    return (int) str_replace(',', '', $string);
}
