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
            style="background-image: url({{ asset('assets/images/login-bg.jpg') }});">
            <div class="container">
                <div class="row justify-content-center no-gutters vertical-align">
                    <div class="col-lg-4 col-md-6 login-fancy-bg bg"
                        style="background-image: url(images/login-inner-bg.jpg);">
                        <div class="login-fancy">
                            <h2 class="text-white mb-20">Hello world!</h2>
                            <p class="mb-20 text-white">Create tailor-cut websites with the exclusive multi-purpose
                                responsive template along with powerful features.</p>
                            <ul class="list-unstyled  pos-bot pb-30">
                                <li class="list-inline-item"><a class="text-white" href="#"> Terms of Use</a> </li>
                                <li class="list-inline-item"><a class="text-white" href="#"> Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 bg-white">
                        <form class="login-fancy pb-40 clearfix" action="{{ route('login') }}" method="POST">
                            @csrf
                            <h3 class="mb-30">Sign In To Admin</h3>
                            <div class="section-field mb-20">
                                <label class="mb-10" for="name">{{ __('auth.email') }}* </label>
                                <input id="name" class="web form-control" type="text" placeholder="{{ __('auth.email') }}"
                                    name="email" autofocus>
                            </div>
                            <div class="section-field mb-20">
                                <label class="mb-10" for="Password">Password* </label>
                                <input id="Password" class="Password form-control" type="password"
                                    placeholder="Password" name="password">
                            </div>
                            <div class="section-field">
                                <div class="remember-checkbox mb-30">
                                    <input type="checkbox" class="form-control" name="two" id="two" />
                                    <label for="two"> Remember me</label>
                                    <a href="password-recovery.html" class="float-right">Forgot Password?</a>
                                </div>
                            </div>
                            <button type="submit" class="button">
                                <span>Log in</span>
                                <i class="fa fa-check"></i>
                            </button>
                            <p class="mt-20 mb-0">Don't have an account? <a href="{{ route('register') }}"> Create one here</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('layouts.footer-scripts')

</body>

</html>