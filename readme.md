## Old School RuneScape Account Search ##

### About ###
The OSRS Account Search is a simple application that displays Old School RuneScape player stats and levels, built using Laravel 5.8 and Vue.js. 

[OSRS_player_stats](https://github.com/FraserProvan2/OSRS_account_search/blob/master/app/OSRS_player_stats.php) is a class that crawls the official OSRS Highscores page, processes and returns the data as a PHP array. This class includes its required utility methods, so it can be reused in other projects. 



<details><summary> View OSRS_player_stats Output </summary>
<p>
    
```
array:24 [
  "Overall" => array:3 [
    "Rank" => 639870
    "Level" => 1289
    "XP" => 11245955
  ]
  "Attack" => array:3 [
    "Rank" => 699148
    "Level" => 71
    "XP" => 852330
  ]
  "Defence" => array:3 [
    "Rank" => 615613
    "Level" => 70
    "XP" => 809282
  ]
  "Strength" => array:3 [
    "Rank" => 808754
    "Level" => 74
    "XP" => 1099265
  ]
  "Hitpoints" => array:3 [
    "Rank" => 694150
    "Level" => 78
    "XP" => 1696355
  ]
  "Ranged" => array:3 [
    "Rank" => 547619
    "Level" => 82
    "XP" => 2426042
  ]
  "Prayer" => array:3 [
    "Rank" => 347105
    "Level" => 70
    "XP" => 761776
  ]
  "Magic" => array:3 [
    "Rank" => 999784
    "Level" => 64
    "XP" => 448523
  ]
  "Cooking" => array:3 [
    "Rank" => 691504
    "Level" => 68
    "XP" => 617757
  ]
  "Woodcutting" => array:3 [
    "Rank" => 1298474
    "Level" => 52
    "XP" => 134054
  ]
  "Fletching" => array:3 [
    "Rank" => 1253818
    "Level" => 32
    "XP" => 16633
  ]
  "Fishing" => array:3 [
    "Rank" => 728588
    "Level" => 62
    "XP" => 349949
  ]
  "Firemaking" => array:3 [
    "Rank" => 879220
    "Level" => 50
    "XP" => 110891
  ]
  "Crafting" => array:3 [
    "Rank" => 704993
    "Level" => 57
    "XP" => 222885
  ]
  "Smithing" => array:3 [
    "Rank" => 798788
    "Level" => 50
    "XP" => 108760
  ]
  "Mining" => array:3 [
    "Rank" => 1116469
    "Level" => 49
    "XP" => 97947
  ]
  "Herblore" => array:3 [
    "Rank" => 655619
    "Level" => 45
    "XP" => 67248
  ]
  "Agility" => array:3 [
    "Rank" => 766262
    "Level" => 55
    "XP" => 167014
  ]
  "Thieving" => array:3 [
    "Rank" => 566127
    "Level" => 53
    "XP" => 143303
  ]
  "Slayer" => array:3 [
    "Rank" => 520044
    "Level" => 68
    "XP" => 650429
  ]
  "Farming" => array:3 [
    "Rank" => 629205
    "Level" => 39
    "XP" => 36337
  ]
  "Runecraft" => array:3 [
    "Rank" => 692017
    "Level" => 32
    "XP" => 16967
  ]
  "Hunter" => array:3 [
    "Rank" => 1266534
    "Level" => 4
    "XP" => 310
  ]
  "Construction" => array:3 [
    "Rank" => 296422
    "Level" => 64
    "XP" => 411898
  ]
]
```
</p>
</details>

The Vue.js frontend uses axios to asynchronously call OSRS_player_stats, process the request (JS Object), and displays the data. The account data is also graded based on the Stats.

![](showcase.gif)


### Installation ###
1. Clone repository 
2. In the terminal, run `Composer Install` to install dependencies
3. Run `npm install`, and then `npm run dev` to build scss/js
4. Set up DB, configure DB mysql settings in .env (Host, Username, Password), you can use .env.example as a template by removing `.example` from the filename
5. In the terminal, run `php artisan migrate --seed` to run DB migrations and seed

### Testing (phpunit) ###
1. Run `vendor/bin/phpunit` in the Terminal

Alternatively to create an alias in the Terminal (root directory):
1. Run `alias test="vendor/bin/phpunit"` to create an alias
2. Run `test` to run feature and unit tests
