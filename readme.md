## About ##
The OSRS Account Search is a simple application that displays Old School Runescape player stats and levels, built using Laravel 5.8 and Vue.js. 

OSRS_player_stats` is a class that crawls the official OSRS Highscores page, processes and returns the data as a PHP array. This class includes its required utility methods, so it can be reused in other projects. 

//

The Vue.js frontend uses axios to asynchronously call OSRS_player_stats, process the request (JS Object), and displays the data. The account data is also graded based on the Stats.

![](public/showcase.gif)


## Installation ##
1. Clone repository 
2. In the terminal, run `Composer Install` to install dependencies
3. Run `npm run dev` to build scss/js
4. Set up DB, configure DB mysql settings in .env (HOST, USERNANE, PASSWORD)
5. In the terminal, run `php artisan migrate --seed` to run DB migrations and seed

## Testing (phpunit) ##
1. Run `vendor/bin/phpunit` in the Terminal

Alternatively to create an alias in the Terminal (root directory):
1. Run `alias test="vendor/bin/phpunit"` to create an alias
2. Run `test` to run feature and unit tests
