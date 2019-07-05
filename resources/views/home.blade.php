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

                <div class="py-2 mt-2">
                    <h3 class="text-center">OSRS Account Look Up</h3>
                </div>

                <div class="row">

                    {{-- Player Look Up --}}
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header text-center">Account Look Up</div>
                            <div class="card-body">
                                <account-look-up></account-look-up>
                            </div>
                        </div>
                    </div>

                    {{-- Recent Searches --}}
                    <div class="col-md-3 text-center">
                        <div class="card h-100">
                            <div class="card-header">Recent Searches</div>
                            <div class="card-body">
                                <ul class="list-group list-group-item-dark">
                                    @foreach($recent_searches as $search)
                                        <li class="list-group-item p-1 border-light text-white">
                                            {{ $search->name }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
    </body>
</html>
