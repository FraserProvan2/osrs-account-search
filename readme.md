## About ##

## Installation ##
1. Clone repository 
2. In the terminal, run `Composer Install` to install dependencies
3. Set up DB, configure DB mysql settings in .env (Host, Username, Password)
4. In the terminal, run `php artisan migrate --seed` to run DB migrations

## Testing (phpunit) ##
1. Run `vendor/bin/phpunit` in the Terminal
Alternatively to create an alias in the Terminal (root directory):
2. Run `alias test="vendor/bin/phpunit"` to create an alias
3. Run `test` to run feature and unit tests