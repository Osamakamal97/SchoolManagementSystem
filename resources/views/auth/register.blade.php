<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')

    @section('title','title')
</head>

<body>

    <div class="wrapper">

        <div id="pre-loader">
            <img src="{{ asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
        </div>
        <section class="height-100vh d-flex align-items-center page-section-ptb login"
            style="background-image: url({{ asset('assets/images/register-bg.jpg') }});">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8 col-md-6 bg-white">
                        <form class="login-fancy pb-40 clearfix" method="POST" action="{{ route('register') }}">
                            @csrf
                            <h3 class="mb-30">Signup</h3>
                            <div class="row">
                                <div class="section-field mb-20 col-sm-6">
                                    <label class="mb-10" for="first_name">{{ __('auth.first_name') }}</label>
                                    <input id="first_name" class="web form-control" type="text" placeholder="First name"
                                        name="first_name" value="{{ old('first_name') }}">
                                    @error('first_name')
                                    <em id="first_name-error" style="color: red"
                                        class="error help-block">{{$message}}</em>
                                    @enderror
                                </div>
                                <div class="section-field mb-20 col-sm-6">
                                    <label class="mb-10" for="last_name">{{ __('auth.last_name') }} </label>
                                    <input id="last_name" class="web form-control" type="text" placeholder="Last name"
                                        name="last_name" value="{{ old('last_name') }}">
                                    @error('last_name')
                                    <em id="fname-error" style="color: red" class="error help-block">{{$message}}</em>
                                    @enderror
                                </div>
                            </div>
                            <div class="section-field mb-20">
                                <label class="mb-10" for="email">{{ __('auth.email') }}* </label>
                                <input type="email" placeholder="Email*" id="email" class="form-control" name="email" value="{{ old('email') }}">
                                @error('email')
                                <em id="fname-error" style="color: red" class="error help-block">{{$message}}</em>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="section-field mb-20 col-sm-6">
                                    <label class="mb-10" for="mobile_number">{{ __('auth.mobile_number') }}* </label>
                                    <input id="mobile_number" class="web form-control" type="text" value="{{ old('mobile_number') }}"
                                        placeholder="First name" name="mobile_number" >
                                    @error('mobile_number')
                                    <em id="fname-error" style="color: red" class="error help-block">{{$message}}</em>
                                    @enderror
                                </div>
                                <div class="section-field mb-20 col-sm-6">
                                    <label class="mb-10" for="birth_date">{{ __('auth.bitrth_date') }}* </label>
                                    <input id="birth_date" class="web form-control" type="text" placeholder="Last name"
                                        name="birth_date" value="{{ old('birth_date') }}">
                                    @error('birth_date')
                                    <em id="fname-error" style="color: red" class="error help-block">{{$message}}</em>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="section-field mb-20 col-sm-6">
                                    <label class="mb-10" for="password">{{ __('auth.password') }} </label>
                                    <input id="password" class="web form-control" type="password" placeholder="First name"
                                        name="password">
                                    @error('password')
                                    <em id="fname-error" style="color: red" class="error help-block">{{$message}}</em>
                                    @enderror
                                </div>
                                <div class="section-field mb-20 col-sm-6">
                                    <label class="mb-10" for="confirm_password">{{ __('auth.confirm_password') }}
                                    </label>
                                    <input id="confirm_password" class="web form-control" type="password"
                                        placeholder="Last name" name="password_confirmation">
                                </div>
                            </div>
                            <button href="#" class="button">
                                <span>Signup</span>
                                <i class="fa fa-check"></i>
                            </button>
                            <p class="mt-20 mb-0">Don't have an account? <a href="login.html"> Create one here</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>
    @include('layouts.footer-scripts')

</body>

</html>