<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <div class="container">

                <h3 class="mt-4 text-center">OSRS Account Look Up</h3>

                <div class="row">

                    {{-- Player Look Up --}}
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">Account Look Up</div>
                            <div class="card-body">
                                {{-- @dump($player_stats) --}}
                                <account-look-up></account-look-up>
                            </div>
                        </div>
                    </div>

                    {{-- Recent Searches --}}
                    <div class="col-md-3">
                        <div class="card h-100">
                            <div class="card-header">Recent Searches</div>
                            <div class="card-body">
                                //
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
    </body>
</html>
