<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Login</title>
</head>
<body class="bg-dark" style="background-image: url({{ mix('resources/imgs/FundoLogin.jpg') }}); background-repeat: no-repeat; background-size: cover;">

    <div id="app">
        <div class="container">
            <div class="col col-md-6 col-lg-4 mx-auto mt-2 mt-lg-5 bg-white rounded shadow">
                <div class="row">
                    <div id="Logo" class="text-center my-4">
                        <img src="{{ mix('resources/imgs/logoplangroup.png') }}" alt="Logo">
                    </div>

                    <div id="form">
                        <form class="col-9 mx-auto mb-4" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="name" class="col col-form-label text-md-end">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="email" class="col col-form-label text-md-end">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="password" class="col col-form-label text-md-end">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">

                                <div class="col">
                                    <label for="password-confirm" class="col col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0 mt-5">
                                <div class="col mb-4 d-grid">
                                    <button type="submit" class="btn btn-dark btn-lg">
                                        {{ __('Register') }}
                                    </button>
                                </div>

                                <a class="btn btn-link" href="{{ route('login') }}">
                                    {{ __('Já possui uma conta?') }}
                                </a>

                                <a class="btn btn-link" href="{{ route('index') }}">
                                    {{ __('Voltar') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-md navbar-dark bg-black text-white fixed-bottom">
            <div class="container">
                <div class="mx-auto">
                    © 2022 Plan Group Brasil, Todos os Direitos Reservados.
                </div>
            </div>
        </nav>
    </div>

</body>
</html>
