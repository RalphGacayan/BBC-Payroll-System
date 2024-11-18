<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="container" style='margin-top: 150px;'>
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card mx-auto w-50">
                <div style="text-align: center; margin-top: 20px;">{{ __('Sign in to start session') }}</div>


                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            

                            <div class="col-md-10 offset-md-1">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            

                            <div class="col-md-10 offset-md-1">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="row mb-3">
                                <div class="col-md-10 offset-md-1 text-md-end">
                                    <button type="submit" class="btn btn-primary" style='margin-left: 220px;'>
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-7">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link forgot-password" href="{{ route('password.request') }}" style="font-size: 14px; margin-left: 12%;">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
s
