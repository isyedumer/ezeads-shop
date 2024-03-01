<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1"
        name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! BaseHelper::googleFonts(
        'https://fonts.googleapis.com/css2?family=' .
            urlencode(theme_option('primary_font', 'Muli')) .
            ':wght@400;600;700&display=swap',
    ) !!}

    <style>
        :root {
            --primary-font: '{{ theme_option('primary_font', 'Muli') }}', sans-serif;
            --primary-color: {{ theme_option('primary_color', '#fab528') }};
            --heading-color: {{ theme_option('heading_color', '#000') }};
            --text-color: {{ theme_option('text_color', '#000') }};
            --primary-button-color: {{ theme_option('primary_button_color', '#000') }};
            --top-header-background-color: {{ theme_option('top_header_background_color', '#f7f7f7') }};
            --middle-header-background-color: {{ theme_option('middle_header_background_color', '#fff') }};
            --bottom-header-background-color: {{ theme_option('bottom_header_background_color', '#fff') }};
            --header-text-color: {{ theme_option('header_text_color', '#000') }};
            --header-text-secondary-color: {{ BaseHelper::hexToRgba(theme_option('header_text_color', '#000'), 0.5) }};
            --header-deliver-color: {{ BaseHelper::hexToRgba(theme_option('header_deliver_color', '#000'), 0.15) }};
            --footer-text-color: {{ theme_option('footer_text_color', '#555') }};
            --footer-heading-color: {{ theme_option('footer_heading_color', '#555') }};
            --footer-hover-color: {{ theme_option('footer_hover_color', '#fab528') }};
            --footer-border-color: {{ theme_option('footer_border_color', '#dee2e6') }};
        }
    </style>

    @php
        Theme::asset()->remove('language-css');
        Theme::asset()
            ->container('footer')
            ->remove('language-public-js');
        Theme::asset()
            ->container('footer')
            ->remove('simple-slider-owl-carousel-css');
        Theme::asset()
            ->container('footer')
            ->remove('simple-slider-owl-carousel-js');
        Theme::asset()
            ->container('footer')
            ->remove('simple-slider-css');
        Theme::asset()
            ->container('footer')
            ->remove('simple-slider-js');
    @endphp

    {!! Theme::header() !!}
    
    {{-- Start custom add meta tags same as ezead.dev site --}}
    <meta name="keywords" property="keywords" content="auction, auctions, classified, classifieds, canadian, canadian, auctions, classifieds, events calendar, fraud gallery, report fraud, business directory, jobs, personals, services wanted, residential rentals, commercial rentals, charity auctions, featured gallery">
    <meta name="rating" content="General" />
    <meta name="expires" content="never" />
    <meta name="language" content="english" />
    <meta name="charset" content="ISO-8859-1" />
    <meta name="distribution" content="Global" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta name="email" content="admin@ezead.com" />
    <meta name="author" content="www.ezead.com" />
    <meta name="publisher" content="Ezead Media Group Inc" />
    <meta name="copyright" content="Copyright 2006 - 2023" />
    {{-- End custom add meta tags same as ezead.dev site --}}

    {{-- Custom include custom-js file --}}
    {!! Theme::partial('custom-js') !!}
    {{-- Custom include custom-css file --}}
    {!! Theme::partial('custom-css') !!}

</head>

<body @if (BaseHelper::siteLanguageDirection() == 'rtl') dir="rtl" @endif
    @if (Theme::get('bodyClass')) class="{{ Theme::get('bodyClass') }}" @endif>
    @if (theme_option('preloader_enabled', 'yes') == 'yes')
        {!! Theme::partial('preloader') !!}
    @endif

    {!! Theme::partial('svg-icons') !!}
    {!! apply_filters(THEME_FRONT_BODY, null) !!}

    <header class="header header-js-handler"
        data-sticky="{{ theme_option('sticky_header_enabled', 'yes') == 'yes' ? 'true' : 'false' }}">
        <div class="header-top d-none d-lg-block p-0 pt-1">
            <div class="container wide d-none">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="header-info">
                            {!! Menu::renderMenuLocation('header-navigation', ['view' => 'menu-default']) !!}
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="header-info header-info-right">
                            <ul>
                                @if (is_plugin_active('language'))
                                    {!! Theme::partial('language-switcher') !!}
                                @endif
                                @if (is_plugin_active('ecommerce'))
                                    @if (count($currencies) > 1)
                                        <li>
                                            <a class="language-dropdown-active" href="#">
                                                <span>{{ get_application_currency()->title }}</span>
                                                <span class="svg-icon">
                                                    <svg>
                                                        <use href="#svg-icon-chevron-down"
                                                            xlink:href="#svg-icon-chevron-down"></use>
                                                    </svg>
                                                </span>
                                            </a>
                                            <ul class="language-dropdown">
                                                @foreach ($currencies as $currency)
                                                    @if ($currency->id !== get_application_currency_id())
                                                        <li>
                                                            <a
                                                                href="{{ route('public.change-currency', $currency->title) }}">
                                                                <span>{{ $currency->title }}</span>
                                                            </a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                    @if (auth('customer')->check())
                                        <li>
                                            <a
                                                href="{{ route('customer.overview') }}">{{ auth('customer')->user()->name }}</a>
                                            <span class="d-inline-block ms-1">(<a href="{{ route('customer.logout') }}"
                                                    class="color-primary">{{ __('Logout') }}</a>)</span>
                                        </li>
                                    @else
                                        <li><a href="{{ route('customer.login') }}">{{ __('Login') }}</a></li>
                                        <!--<li><a href="{{ route('customer.register') }}">{{ __('Register') }}</a></li>-->
                                        <li><a href="https://ezead.com/register"
                                                target="_blank">{{ __('Register') }}</a></li>
                                    @endif
                                    {{-- <li>
                                        <a href="{{ auth('customer')->check() ? 'https://ezead.com/login?u=' . auth('customer')->user()->id . '&r=shop.ezead.com' : 'https://ezead.com/' }}"
                                            target="_blank">
                                            EzeAd
                                        </a>
                                    </li> --}}
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle mb-4 shadow">
            <div class="container wide">
                <div class="header-wrapper py-3">
                    <div class="header-items header__left">
                        @if (theme_option('logo'))
                            <div class="logo">
                                <a href="{{ route('public.index') }}">
                                    <img src="{{ RvMedia::getImageUrl(theme_option('logo')) }}"
                                        alt="{{ theme_option('site_title') }}" />
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="header-items header__center d-none">
                        @if (is_plugin_active('ecommerce'))
                            <form class="form--quick-search" action="{{ route('public.products') }}"
                                data-ajax-url="{{ route('public.ajax.search-products') }}" method="get">
                                <div class="form-group--icon" style="display: none">
                                    <div class="product-category-label">
                                        <span class="text">{{ __('All Categories') }}</span>
                                        <span class="svg-icon">
                                            <svg>
                                                <use href="#svg-icon-chevron-down" xlink:href="#svg-icon-chevron-down">
                                                </use>
                                            </svg>
                                        </span>
                                    </div>
                                    <select class="form-control product-category-select" name="categories[]">
                                        <option value="0">{{ __('All Categories') }}</option>
                                        {!! Theme::partial('product-categories-select', ['categories' => $categories, 'indent' => null]) !!}
                                    </select>
                                </div>
                                <input class="form-control input-search-product" name="q" type="text"
                                    placeholder="{{ __('I m shopping for...') }}" autocomplete="off">
                                <button class="btn" type="submit">
                                    <span class="svg-icon">
                                        <svg>
                                            <use href="#svg-icon-search" xlink:href="#svg-icon-search"></use>
                                        </svg>
                                    </span>
                                </button>
                                <div class="panel--search-result"></div>
                            </form>
                        @endif
                    </div>
                    <div class="header-items header__right">

                        @if (theme_option('hotline'))
                            <div class="header__extra header-support">
                                <div class="header-box-content">
                                    <span>{{ theme_option('hotline') }}</span>
                                    <p>{{ __('Support 24/7') }}</p>
                                </div>
                            </div>
                        @endif

                        {{-- Start Custom Login, Regitser and AuthName --}}
                        <div class="header__extra header-support">
                            <div class="ps-5">
                                @if (auth('customer')->check())
                                    <div class="dropdown">
                                        <div id="dropdownMenuButton" class="dropdown-toggle" data-mdb-toggle="dropdown"
                                            aria-expanded="false">
                                            <span class="d-inline-block custom-auth-icons">
                                                <i class="fas fa-user-circle"></i>
                                            </span>
                                            <a href="{{ route('customer.overview') }}" class="custom-auth">
                                                {{ auth('customer')->user()->name }}
                                            </a>
                                            {{-- <span class="d-inline-block custom-auth-icons">
                                                <i class="fas fa-chevron-down"></i>
                                            </span> --}}
                                        </div>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li>
                                                <a href="{{ route('customer.logout') }}"
                                                    class="dropdown-item">{{ __('Logout') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                @else
                                    <div>
                                        <a href="https://ezead.com/register" class="custom-auth" target="_blank">
                                            {{ __('Register') }}
                                        </a>
                                        <span class="or-4281208362">&nbsp;or&nbsp;</span>
                                        <a href="#" class="custom-auth" data-bs-toggle="modal"
                                            data-bs-target="#loginModal">
                                            Sign In
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- Start Custom Login Modal --}}
                        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-light">
                                        <nav>
                                            <div class="nav">
                                                <h4 class="fs-5 fw-bold m-0">
                                                    <i class="fas fa-sign-in-alt"></i>
                                                    {{ __('Log In Your Account') }}
                                                </h4>
                                            </div>
                                        </nav>
                                        <button type="button" class="btn-close close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{-- custom login page --}}
                                        {{-- <p class="text-center py-3">
                                            <b>You can use same login details of ezead.com</b>
                                        </p> --}}
                                        <form class="mt-2" method="POST"
                                            action="{{ route('customer.login.post') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="email">
                                                    <p>
                                                        <b>{{ __('Email') }}: <sup style="color: red;">*</sup></b>
                                                    </p>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text bg-light">
                                                            <i class="fas fa-user"
                                                                style="padding-top: 5px;height: 26px;color: black;"></i>
                                                        </span>
                                                    </div>
                                                    <input
                                                        class="form-control @if ($errors->has('email')) is-invalid @endif"
                                                        type="text" required=""
                                                        placeholder="{{ __('Your Email') }}" name="email"
                                                        autocomplete="email" value="{{ old('email') }}">
                                                </div>
                                                @if ($errors->has('email'))
                                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                                @endif
                                            </div>
                                            <label for="password">
                                                <p>
                                                    <b>{{ __('Password') }}: <sup style="color: red;">*</sup></b>
                                                </p>
                                            </label>
                                            <div class="input-group mb-3 input-group-with-text">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-light">
                                                        <i class="fas fa-lock"
                                                            style="padding-top: 5px;height: 26px;color: black;"></i>
                                                    </span>
                                                </div>
                                                <input
                                                    class="form-control @if ($errors->has('password')) is-invalid @endif"
                                                    type="password" placeholder="{{ __('Password') }}"
                                                    aria-label="{{ __('Password') }}" autocomplete="current-password"
                                                    name="password">
                                                <span class="input-group-text">
                                                    <a class="lost-password"
                                                        href="{{ route('customer.password.reset') }}">{{ __('Forgot?') }}</a>
                                                </span>
                                            </div>

                                            <div class="form-check mb-3">
                                                <input class="form-check-input" name="remember" id="remember-me"
                                                    type="checkbox" value="1"
                                                    @if (old('is_vendor') == 1) checked="checked" @endif>
                                                <label class="form-check-label"
                                                    for="remember-me">{{ __('Remember me?') }}</label>
                                            </div>
                                            <div class="d-grid">
                                                <button class="btn btn-primary" type="submit">
                                                    {{ __('Log in') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center bg-light">
                                        <div class="mt-3">
                                            <p class="text-center">{{ __("Don't Have an Account?") }}
                                                {{-- <a href="{{ route('customer.register') }}" class="d-inline-block text-primary">
                                                        {{ __('Sign up now') }}
                                                    </a> --}}
                                                <a href="https://ezead.com/register"
                                                    class="d-inline-block text-primary" target="_blank">
                                                    {{ __('Sign up now') }}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Custom Login Modal --}}

                        {{-- End Custom Login, Regitser and AuthName --}}

                        <div class="header__extra header-support ps-3 d-none">
                            <div class="header-box-content">

                                <a href="#" class="btn pe-0" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" style="color: #d85200;">
                                    <b>All Regions</b>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        style="width: 16px; height: 16px; vertical-align: middle; margin-left: 4px;">
                                        <path d="M6 9l6 6 6-6" />
                                    </svg>
                                </a>

                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    <span>Browse and Search</span>
                                                    <span class="svg-icon">
                                                        <svg>
                                                            <use href="#svg-icon-search"
                                                                xlink:href="#svg-icon-search">
                                                            </use>
                                                        </svg>
                                                    </span>
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="mb-3">
                                                        <div class="row">
                                                            {{-- Country --}}
                                                            <div class="col-12 pb-3 text-start">
                                                                <label for="formGroupExampleInput" class="form-label"
                                                                    style="color: #3f6f9f;">
                                                                    <h6>
                                                                        Select Country
                                                                    </h6>
                                                                </label>
                                                                <select id="country"
                                                                    class="form-select px-3 country"
                                                                    aria-label="Default select example">
                                                                    {{-- Custom Ajax Call Country --}}
                                                                </select>
                                                            </div>
                                                            {{-- Province --}}
                                                            <div class="col-12 pb-3 text-start col_province d-none">
                                                                <label for="formGroupExampleInput" class="form-label"
                                                                    style="color: #3f6f9f;">
                                                                    <h6>
                                                                        Select Province
                                                                    </h6>
                                                                </label>
                                                                <select id="province"
                                                                    class="form-select px-3 province"
                                                                    aria-label="Default select example">
                                                                    {{-- Custom Ajax Call Provinces --}}
                                                                </select>
                                                            </div>
                                                            {{-- Region --}}
                                                            <div class="col-12 pb-3 text-start col_region d-none">
                                                                <label for="formGroupExampleInput" class="form-label"
                                                                    style="color: #3f6f9f;">
                                                                    <h6>
                                                                        Select Region
                                                                    </h6>
                                                                </label>
                                                                <select id="region" class="form-select px-3 region"
                                                                    aria-label="Default select example">
                                                                    {{-- Custom Ajax Call Region --}}
                                                                </select>
                                                            </div>
                                                            {{-- City --}}
                                                            <div class="col-12 pb-3 text-start col_city d-none">
                                                                <label for="formGroupExampleInput" class="form-label"
                                                                    style="color: #3f6f9f;">
                                                                    <h6>
                                                                        Select City
                                                                    </h6>
                                                                </label>
                                                                <select id="city" class="form-select px-3 city"
                                                                    aria-label="Default select example">
                                                                    {{-- Custom Ajax Call City --}}
                                                                </select>
                                                            </div>
                                                            {{-- Neighbour --}}
                                                            <div class="col-12 pb-3 text-start col_neighbour d-none">
                                                                <label for="formGroupExampleInput" class="form-label"
                                                                    style="color: #3f6f9f;">
                                                                    <h6>
                                                                        Select Neighbour
                                                                    </h6>
                                                                </label>
                                                                <select id="neighbour"
                                                                    class="form-select px-3 neighbour"
                                                                    aria-label="Default select example">
                                                                    {{-- Custom Ajax Call Neighbour --}}
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button id="searchLocation" type="button"
                                                    class="btn btn-secondary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        @if (is_plugin_active('ecommerce'))
                            @if (EcommerceHelper::isCompareEnabled())
                                <div class="header__extra header-compare">
                                    <a class="btn-compare" href="{{ route('public.compare') }}">
                                        <i class="icon-repeat"></i>
                                        <span
                                            class="header-item-counter">{{ Cart::instance('compare')->count() }}</span>
                                    </a>
                                </div>
                            @endif
                            @if (EcommerceHelper::isWishlistEnabled())
                                <div class="header__extra header-wishlist">
                                    <a class="btn-wishlist" href="{{ route('public.wishlist') }}">
                                        <span class="svg-icon">
                                            <svg>
                                                <use href="#svg-icon-wishlist" xlink:href="#svg-icon-wishlist"></use>
                                            </svg>
                                        </span>
                                        <span class="header-item-counter">
                                            {{ auth('customer')->check()? auth('customer')->user()->wishlist()->count(): Cart::instance('wishlist')->count() }}
                                        </span>
                                    </a>
                                </div>
                            @endif
                            @if (EcommerceHelper::isCartEnabled())
                                <div class="header__extra cart--mini" tabindex="0" role="button">
                                    <div class="header__extra">
                                        <a class="btn-shopping-cart" href="{{ route('public.cart') }}">
                                            <span class="svg-icon">
                                                <svg>
                                                    <use href="#svg-icon-cart" xlink:href="#svg-icon-cart"></use>
                                                </svg>
                                            </span>
                                            <span
                                                class="header-item-counter">{{ Cart::instance('cart')->count() }}</span>
                                        </a>
                                        <span class="cart-text">
                                            <span class="cart-title">{{ __('Your Cart') }}</span>
                                            <span class="cart-price-total">
                                                <span class="cart-amount">
                                                    <bdi>
                                                        <span>{{ format_price(Cart::instance('cart')->rawSubTotal() + Cart::instance('cart')->rawTax()) }}</span>
                                                    </bdi>
                                                </span>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="cart__content" id="cart-mobile">
                                        <div class="backdrop"></div>
                                        <div class="mini-cart-content">
                                            <div class="widget-shopping-cart-content">
                                                {!! Theme::partial('cart-mini.list') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            <div class="custom-navbar pt-3">
                <div class="container wide">
                    <nav class="navbar navbar-expand-lg navbar-light pt-0">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    {{-- @php $count = 0; @endphp
                                    @foreach ($categories->sortBy('name') as $cat)
                                        @if ($count < 7 && $cat->parent_id == 0)
                                            <li class="nav-item">
                                                <a href="{{ $cat->url }}" class="nav-link" aria-current="page">
                                                    <b>{{str($cat->name)->limit(16)}}</b>
                                                </a>
                                            </li>
                                        @endif
                                        @php $count++; @endphp
                                    @endforeach --}}
                                    @if (is_plugin_active('ecommerce'))
                                        <li class="menu--product-categories custom-menu--product-categories nav-item">
                                            <div class="main-category-wrapper" style="display: grid;">
                                                <span class="cat_icon text-center" style="font-size: 24px">
                                                    <i class="fas fa-th-list"></i>
                                                </span>
                                                <span class="cat_name">
                                                    <b>Browse All Categories</b>
                                                </span>
                                            </div>
                                            <div class="menu__content">
                                                <ul class="menu--dropdown">
                                                    {!! Theme::partial('product-categories-dropdown', compact('categories')) !!}
                                                </ul>
                                            </div>
                                        </li>
                                    @endif
                                    <li class="nav-item">
                                        <a href="//ezead.com" class="nav-link" aria-current="page" target="_blank">
                                            <div class="main-category-wrapper" style="display: grid;">
                                                <span class="cat_icon text-center" style="font-size: 24px">
                                                    <i class="fas fa-globe"></i>
                                                </span>
                                                <span class="cat_name">
                                                    <b>Eze AD</b>
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="//ezead.community" class="nav-link" aria-current="page"
                                            target="_blank">
                                            <div class="main-category-wrapper" style="display: grid;">
                                                <span class="cat_icon text-center" style="font-size: 24px">
                                                    <i class="fas fa-users"></i>
                                                </span>
                                                <span class="cat_name">
                                                    <b>Community</b>
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="//eze.email" class="nav-link" aria-current="page" target="_blank">
                                            <div class="main-category-wrapper" style="display: grid;">
                                                <span class="cat_icon text-center" style="font-size: 24px">
                                                    <i class="fas fa-envelope"></i>
                                                </span>
                                                <span class="cat_name">
                                                    <b>Eze.email</b>
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="//ezelive.com" class="nav-link" aria-current="page"
                                            target="_blank">
                                            <div class="main-category-wrapper" style="display: grid;">
                                                <span class="cat_icon text-center" style="font-size: 24px">
                                                    <i class="fas fa-question-circle"></i>
                                                </span>
                                                <span class="cat_name">
                                                    <b>Ezelive Help</b>
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="//ezeadhost.com" class="nav-link" aria-current="page"
                                            target="_blank">
                                            <div class="main-category-wrapper" style="display: grid;">
                                                <span class="cat_icon text-center" style="font-size: 24px">
                                                    <i class="fas fa-server"></i>
                                                </span>
                                                <span class="cat_name">
                                                    <b>Hosting</b>
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="//ezead.info" class="nav-link" aria-current="page" target="_blank">
                                            <div class="main-category-wrapper" style="display: grid;">
                                                <span class="cat_icon text-center" style="font-size: 24px">
                                                    <i class="fa fa-info-circle"></i>
                                                </span>
                                                <span class="cat_name">
                                                    <b>Info</b>
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="//ezead.work" class="nav-link" aria-current="page" target="_blank">
                                            <div class="main-category-wrapper" style="display: grid;">
                                                <span class="cat_icon text-center" style="font-size: 24px">
                                                    <i class="fas fa-tasks"></i>
                                                </span>
                                                <span class="cat_name">
                                                    <b>Jobs</b>
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page">
                                            <div class="main-category-wrapper" style="display: grid;">
                                                <span class="cat_icon text-center" style="font-size: 24px">
                                                    <i class="fas fa-building"></i>
                                                </span>
                                                <span class="cat_name">
                                                    <b>Rentals</b>
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="//www.ezead.services/" class="nav-link" aria-current="page"
                                            target="_blank">
                                            <div class="main-category-wrapper" style="display: grid;">
                                                <span class="cat_icon text-center" style="font-size: 24px">
                                                    <i class="fas fa-wrench"></i>
                                                </span>
                                                <span class="cat_name">
                                                    <b>Services</b>
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="themeModeLI pt-4 ">
                                        <a id="themeMode" class="btn btn-light themeModeButton border shadow ms-2">
                                            <i class="fa fa-moon"></i>
                                            <b>Light Mode</b>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="header-bottom custom-header-bottom-bg">
            <div class="header-wrapper">
                <nav class="navigation">
                    <div class="container wide">
                        {{-- <div class="navigation__left">
                            @if (is_plugin_active('ecommerce'))
                                <div class="menu--product-categories">
                                    <div class="menu__toggle">
                                        <span class="svg-icon">
                                            <svg>
                                                <use href="#svg-icon-list" xlink:href="#svg-icon-list"></use>
                                            </svg>
                                        </span>
                                        <span class="menu__toggle-title">{{ __('Shop by Category') }}</span>
                                    </div>
                                    <div class="menu__content">
                                        <ul class="menu--dropdown">
                                            {!! Theme::partial('product-categories-dropdown', compact('categories')) !!}
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div> --}}
                        <div class="text-center">
                            {!! Menu::renderMenuLocation('main-menu', [
                                'view' => 'menu',
                                'options' => ['class' => 'menu'],
                            ]) !!}
                            <div class="Home-page-title">
                                <h1>
                                    <b>Find Anything</b>
                                </h1>
                            </div>
                        </div>
                        <div class="container-xxxl">
                            <div class="navigation__right">
                                @if (is_plugin_active('ecommerce') && EcommerceHelper::isEnabledCustomerRecentlyViewedProducts())
                                    <div class="header-recently-viewed"
                                        data-url="{{ route('public.ajax.recently-viewed-products') }}"
                                        role="button">
                                        <h3 class="recently-title">
                                            <span class="svg-icon recent-icon me-1">
                                                <svg>
                                                    <use href="#svg-icon-refresh" xlink:href="#svg-icon-refresh">
                                                    </use>
                                                </svg>
                                            </span>
                                            {{ __('Recently Viewed') }}
                                        </h3>
                                        <div class="recently-viewed-inner container-xxxl">
                                            <div class="recently-viewed-content">
                                                <div class="loading--wrapper">
                                                    <div class="loading"></div>
                                                </div>
                                                <div class="recently-viewed-products"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="header-items header__center">
                <div class="container wide">
                    @if (is_plugin_active('ecommerce'))
                        <form class="form--quick-search mx-5 px-5" action="{{ route('public.products') }}"
                            data-ajax-url="{{ route('public.ajax.search-products') }}" method="get">
                            <div class="row">
                                <div class="col-12 px-5 py-3 rounded" style="background-color: whitesmoke;">
                                    <div class="row gx-1 gy-1">
                                        <div class="col-xl-6 col-md-6 col-sm-12 col-12 px-2">
                                            {{-- <span class="svg-icon"
                                                style="color:#777777;position: absolute;padding: 12px 0px 10px 22px;">
                                                <svg>
                                                    <use href="#svg-icon-search" xlink:href="#svg-icon-search">
                                                    </use>
                                                </svg>
                                            </span> --}}
                                            <span
                                                style="color:#777777;position: absolute;padding: 12px 0px 10px 28px;">
                                                <i class="fas fa-globe"></i>
                                            </span>
                                            <input
                                                class="form-control custom-box-shadow input-search-product m-1 px-5 border-0 bg-transparent"
                                                name="q" type="text"
                                                placeholder="{{ __('I m shopping for...') }}" autocomplete="off">
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-sm-12 col-12 px-2">
                                            <div class="form-group--icon" style="display: none">
                                                <select
                                                    class="form-select px-3 my-1 product-category-select border-0 bg-transparent"
                                                    name="categories[]">
                                                    <option value="0">{{ __('All Categories') }}</option>
                                                    {!! Theme::partial('product-categories-select', ['categories' => $categories, 'indent' => null]) !!}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-md-6 col-sm-12 col-12 text-center">
                                            <button class="btn btn-primary btn-block px-3" type="submit"
                                                style="color: #fff;">
                                                {{-- <span class="svg-icon">
                                                    <svg>
                                                        <use href="#svg-icon-search" xlink:href="#svg-icon-search">
                                                        </use>
                                                    </svg>
                                                </span> --}}
                                                <i class="fas fa-search"></i>
                                                Search Now
                                            </button>
                                            <div class="panel--search-result"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <div class="header-mobile header-js-handler"
            data-sticky="{{ theme_option('sticky_header_mobile_enabled', 'yes') == 'yes' ? 'true' : 'false' }}">
            <div class="header-items-mobile header-items-mobile--left">
                <div class="menu-mobile">
                    <div class="menu-box-title">
                        <div class="icon menu-icon toggle--sidebar" href="#menu-mobile">
                            <span class="svg-icon">
                                <svg>
                                    <use href="#svg-icon-list" xlink:href="#svg-icon-list"></use>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-items-mobile header-items-mobile--center">
                @if (theme_option('logo'))
                    <div class="logo">
                        <a href="{{ route('public.index') }}">
                            <img src="{{ RvMedia::getImageUrl(theme_option('logo')) }}"
                                alt="{{ theme_option('site_title') }}" width="155" />
                        </a>
                    </div>
                @endif
            </div>
            <div class="header-items-mobile header-items-mobile--right">
                <div class="search-form--mobile search-form--mobile-right search-panel">
                    <a class="open-search-panel toggle--sidebar" href="#search-mobile">
                        <span class="svg-icon">
                            <svg>
                                <use href="#svg-icon-search" xlink:href="#svg-icon-search"></use>
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </header>
