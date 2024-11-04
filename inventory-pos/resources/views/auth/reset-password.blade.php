<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Login</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="account-page">

    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content" style="margin-left: 420px">
                    <div class="login-userset">
                        <div class="login-logo">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="img">
                        </div>
                        <div class="login-userheading">
                            <h3>Create an Account</h3>
                            <h4>Continue where you left off</h4>
                        </div>
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="form-login">
                                <label>Full Name</label>
                                <div class="form-addons">
                                    <input type="text" name="name" placeholder="Enter your full name">
                                    <img src="{{ asset('assets/img/icons/users1.svg') }}" alt="img">
                                </div>
                                <div class="text-danger"><x-input-error :messages="$errors->get('name')" class="mt-2" /></div>
                            </div>
                            <div class="form-login">
                                <label>Email</label>
                                <div class="form-addons">
                                    <input type="text" name="email" placeholder="Enter your email address">
                                    <img src="{{ asset('assets/img/icons/mail.svg') }}" alt="img">
                                </div>
                                <div class="text-danger"><x-input-error :messages="$errors->get('email')" class="mt-2" /></div>
                            </div>
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" name="password" class="pass-input"
                                        placeholder="Enter your password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                                <div class="text-danger"><x-input-error :messages="$errors->get('password')" class="mt-2" /></div>
                            </div>
                            <div class="form-login">
                                <label>Confirm Password</label>
                                <div class="pass-group">
                                    <input type="password" name="password_confirmation" class="pass-input"
                                        placeholder="Enter your password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                                <div class="text-danger"><x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" /></div>
                            </div>
                            <div class="form-login">
                                <button type="submit" class="btn btn-login">Sign Up</button>
                            </div>
                        </form>
                        <div class="signinform text-center">
                            <h4>Already a user? <a href="{{ route('login') }}" class="hover-a">Sign In</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('assets/js/feather.min.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
