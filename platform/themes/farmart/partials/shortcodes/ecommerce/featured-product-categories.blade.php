@php
    $slick = [
        'rtl' => BaseHelper::siteLanguageDirection() == 'rtl',
        'appendArrows' => '.arrows-wrapper',
        'arrows' => true,
        'dots' => false,
        'autoplay' => $shortcode->is_autoplay == 'yes',
        'infinite' => $shortcode->infinite == 'yes' || $shortcode->is_infinite == 'yes',
        'autoplaySpeed' => in_array($shortcode->autoplay_speed, theme_get_autoplay_speed_options()) ? $shortcode->autoplay_speed : 3000,
        'speed' => 800,
        'slidesToShow' => 8,
        'slidesToScroll' => 1,
        'responsive' => [
            [
                'breakpoint' => 1700,
                'settings' => [
                    'slidesToShow' => 7,
                ],
            ],
            [
                'breakpoint' => 1500,
                'settings' => [
                    'slidesToShow' => 6,
                ],
            ],
            [
                'breakpoint' => 1199,
                'settings' => [
                    'slidesToShow' => 5,
                ],
            ],
            [
                'breakpoint' => 1024,
                'settings' => [
                    'slidesToShow' => 4,
                ],
            ],
            [
                'breakpoint' => 767,
                'settings' => [
                    'arrows' => false,
                    'dots' => true,
                    'slidesToShow' => 2,
                    'slidesToScroll' => 2,
                ],
            ],
        ],
    ];
    
    $categories = get_featured_product_categories();
@endphp
{{-- Custom Hide Categories --}}
{{-- @if ($categories->count())
    <div class="widget-product-categories pb-2">
        <div class="caretgories-background-image">
            <div class="container wide">
                <div class="row">
                    <div class="col-12 bg-white">
                        <div class="text-center p-3">
                            <h2 class="col-auto mb-0 py-2">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                        </div>
                        <div class="product-categories-body pb-4 arrows-top-right">
                            <div data-slick="{{ json_encode($slick) }}"
                                class="product-categories-box slick-slides-carousel">
                                @foreach ($categories as $item)
                                    <div class="product-category-item p-3">
                                        <div class="category-item-body p-3">
                                            <a class="d-block py-3" href="{{ $item->url }}">
                                                <div class="category__thumb img-fluid-eq mb-3">
                                                    <div class="img-fluid-eq__dummy"></div>
                                                    <div class="img-fluid-eq__wrap">
                                                        <img class="lazyload mx-auto"
                                                            data-src="{{ RvMedia::getImageUrl($item->image, 'small', false, RvMedia::getDefaultImage()) }}"
                                                            alt="{{ $item->name }}" />
                                                    </div>
                                                </div>
                                                <div class="category__text text-center py-3">
                                                    <h6 class="category__name">{{ $item->name }}</h6>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="arrows-wrapper"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif --}}

<div class="top-main-heading row text-center coming-soon">
    <div class="background"></div>
    <div class="container-coming-soon">
        <div class="top">
            <hr>
            <p>EZEAD STORE</p>
            <hr>
        </div>
        <h1>UNDER CONSTRUCTION</h1>
        <h3>COMING SOON</h3>
    </div>
</div>

{{-- Custom Add Categories --}}
@if ($categories->count())
    <div class="widget-product-categories pb-2">
        <div class="custom-header-bottom-bg pt-2">
            <div class="header-wrapper">
                <nav class="navigation">
                    <div class="container wide">
                        <div class="row d-none">
                            {{-- CUSTOM -> Only Mobile Header All Sites Links --}}
                            <nav class="navbar navbar-expand-lg navbar-light pt-0">
                                <div class="col-md-6 col-12 text-center">
                                    <ul class="nav justify-content-center"
                                        style="display:-webkit-inline-box;list-style:none;">
                                        <li class="nav-item">
                                            <a href="//eze.email" class="nav-link custom-nav-link" aria-current="page"
                                                target="_blank">
                                                <div class="main-category-wrapper" style="display: grid;">
                                                    <span class="cat_icon text-center" style="font-size: 24px">
                                                        <i class="fas fa-envelope"></i>
                                                    </span>
                                                    <span class="cat_name">
                                                        Eze.email
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="//ezelive.com" class="nav-link custom-nav-link" aria-current="page"
                                                target="_blank">
                                                <div class="main-category-wrapper" style="display: grid;">
                                                    <span class="cat_icon text-center" style="font-size: 24px">
                                                        <i class="fas fa-question-circle"></i>
                                                    </span>
                                                    <span class="cat_name">
                                                        Help
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="//ezeadhost.com" class="nav-link custom-nav-link"
                                                aria-current="page" target="_blank">
                                                <div class="main-category-wrapper" style="display: grid;">
                                                    <span class="cat_icon text-center" style="font-size: 24px">
                                                        <i class="fas fa-server"></i>
                                                    </span>
                                                    <span class="cat_name">
                                                        Hosting
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="//ezead.info" class="nav-link custom-nav-link" aria-current="page"
                                                target="_blank">
                                                <div class="main-category-wrapper" style="display: grid;">
                                                    <span class="cat_icon text-center" style="font-size: 24px">
                                                        <i class="fa fa-info-circle"></i>
                                                    </span>
                                                    <span class="cat_name">
                                                        Info
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6 col-12 text-center">
                                    <ul class="nav justify-content-center"
                                        style="display:-webkit-inline-box;list-style:none;">
                                        <li class="nav-item">
                                            <a href="//ezead.work" class="nav-link custom-nav-link" aria-current="page"
                                                target="_blank">
                                                <div class="main-category-wrapper" style="display: grid;">
                                                    <span class="cat_icon text-center" style="font-size: 24px">
                                                        <i class="fas fa-tasks"></i>
                                                    </span>
                                                    <span class="cat_name">
                                                        Jobs
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link custom-nav-link" aria-current="page">
                                                <div class="main-category-wrapper" style="display: grid;">
                                                    <span class="cat_icon text-center" style="font-size: 24px">
                                                        <i class="fas fa-building"></i>
                                                    </span>
                                                    <span class="cat_name">
                                                        Rentals
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="//www.ezead.services" class="nav-link custom-nav-link"
                                                aria-current="page" target="_blank">
                                                <div class="main-category-wrapper" style="display: grid;">
                                                    <span class="cat_icon text-center" style="font-size: 24px">
                                                        <i class="fas fa-wrench"></i>
                                                    </span>
                                                    <span class="cat_name">
                                                        Services
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="//shop.ezead.com" class="nav-link custom-nav-link"
                                                aria-current="page" target="_blank">
                                                <div class="main-category-wrapper" style="display: grid;">
                                                    <span class="cat_icon text-center" style="font-size: 24px">
                                                        <i class="fas fa-store"></i>
                                                    </span>
                                                    <span class="cat_name">
                                                        Store
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="text-center py-2">
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
                        {{-- <div class="container-xxxl">
                            <div class="navigation__right">
                                @if (is_plugin_active('ecommerce') && EcommerceHelper::isEnabledCustomerRecentlyViewedProducts())
                                    <div class="header-recently-viewed"
                                        data-url="{{ route('public.ajax.recently-viewed-products') }}" role="button">
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
                        </div> --}}
                    </div>
                </nav>
            </div>
            <div class="header-items header__center">
                <div class="container wide">
                    @if (is_plugin_active('ecommerce'))
                        <form class="form--quick-search mx-5 px-5" action="{{ route('public.products') }}"
                            data-ajax-url="{{ route('public.ajax.search-products') }}" method="get">
                            <div class="row">
                                <div class="col-12 px-5 py-3 rounded" style="background-color:#f3f3f3;">
                                    <div class="row gx-1 gy-1">
                                        <div class="col-xl-6 col-md-6 col-sm-12 col-12 px-2">
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
                                        <div class="col-xl-2 col-md-12 col-sm-12 col-12 text-center d-grid gap-2">
                                            <button class="btn btn-primary btn-block px-3" type="submit"
                                                style="color: #fff;">
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
        <div class="caretgories-background-image">
            <div class="container wide">
                <div class="row">
                    <div class="col-12 bg-white">
                        <div class="p-3">
                            <h2 class="col-auto mb-0 py-2">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                        </div>
                        <div class="product-categories-body pb-4 arrows-top-right">

                            <div class="container">
                                <div class="row">
                                    @php $count = 0; @endphp
                                    <!-- Initialize the counter variable -->
                                    @foreach ($categories->sortBy('name') as $item)
                                        @if ($item->parent_id == 0)
                                            <div class="col-12 col-sm-4 col-md-4">
                                                <!-- Use col-12 for extra small screens, col-sm-6 for small screens, and col-md-4 for medium screens and larger -->
                                                <!-- Your item content goes here -->
                                                <a href="{{ $item->url }}" class="pt-2 m-0">{{ $item->name }}</a>
                                                <hr>
                                            </div>
                                        @endif
                                        @php $count++; @endphp
                                        <!-- Increment the counter after each item -->
                                        {{-- @if ($count % 3 === 0)
                                            <div class="w-100"></div>
                                            <!-- Add an empty div with w-100 to create a new row after every three items -->
                                        @endif --}}
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
