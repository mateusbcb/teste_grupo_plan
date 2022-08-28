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
                        <form class="col-9 mx-auto mb-4" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="email" class="col col-form-label text-md-end">{{ __('Nome de Usuário') }}</label>
                                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="password" class="col col-form-label text-md-end">{{ __('Senha') }}</label>
                                    <div class="input-group mb-3">
                                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror border border-end-0" name="password" required autocomplete="current-password">
                                        <button class="btn text-primary border border-start-0" id="showPasword">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-check ms-3">
                                        <input class="form-check-input fs-4" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label fs-5" for="remember">
                                            {{ __('Lembre-me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-dark btn-lg">
                                        {{ __('Acessar') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link mt-5" href="{{ route('password.request') }}">
                                            {{ __('Perdeu a senha?') }}
                                        </a>

                                        <a class="btn btn-link" href="{{ route('register') }}">
                                            {{ __('Ainda não tem conta?') }}
                                        </a>

                                        <a class="btn btn-link" href="{{ route('index') }}">
                                            {{ __('Voltar') }}
                                        </a>
                                    @endif
                                </div>
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

    <script>
        let showPasword = document.querySelector('#showPasword').addEventListener('click', (e) => {
            e.preventDefault()

            let password = document.querySelector('#password')

            if (password.type === "password") {
                password.type = "text";
            } else {
                password.type = "password";
            }
        })
    </script>

</body>
</html>
