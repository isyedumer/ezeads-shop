<div class="banner my-3">
    <div class="container wide">
        <div class="row">
            <div class="col-md-5 header-text">
                <h3 class="banner-heading">
                    <span>Have extra summer tires?</span> Lots of people are looking right now - so take advantage and
                    list them within minutes.
                </h3>
            </div>
            <div class="col-md-7 header-image">
                <a class="image-link" data-testid="tile" href="#" target="_self">
                    <div class="inner-header"
                        style="background-image:url({{ url('https://ezead.com/storage/app/images/6.jpg') }})">
                        <div class="links-custom">
                            <span class="title">
                                Sell today
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

@if (auth('customer')->check())
    <div class="container wide mt-5 ezeadPosts">
        <div>
            <h2 style="font-family: var(--primary-font);">
                <span class="title-3" style="font-weight: 700;">
                    My Ezead Posts
                </span>
                <a href="https://ezead.com/lp/search" style="font-size: 16px;float:right;" class="pt-2"
                    target="_blank">
                    See All Listing
                </a>
            </h2>
        </div>
        <div class="row custom-box-ezead-post">
            {{-- Ajax Ezead Posts --}}
        </div>
    </div>
@endif

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
        'slidesToShow' => 4,
        'slidesToScroll' => 1,
        'responsive' => [
            [
                'breakpoint' => 1024,
                'settings' => [
                    'slidesToShow' => 2,
                ],
            ],
            [
                'breakpoint' => 767,
                'settings' => [
                    'arrows' => false,
                    'dots' => true,
                    'slidesToShow' => 2,
                    'slidesToScroll' => 1,
                ],
            ],
        ],
    ];
    $brands = get_featured_brands();
@endphp
<div class="widget-featured-brands">
    <div class="container wide">
        <div class="row">
            <div class="col-12">
                <div class="row align-items-center mb-2 widget-header">
                    <h2 class="col-auto mb-0 py-2">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                </div>
                <div class="featured-brands__body arrows-top-right">
                    <div class="featured-brands-body slick-slides-carousel" data-slick="{{ json_encode($slick) }}">
                        @foreach ($brands as $brand)
                            <div class="featured-brand-item">
                                <div class="brand-item-body mx-2 py-4 px-2">
                                    <a class="py-3" href="{{ $brand->url }}">
                                        <div class="brand__thumb mb-3 img-fluid-eq">
                                            <div class="img-fluid-eq__dummy"></div>
                                            <div class="img-fluid-eq__wrap">
                                                <img class="lazyload mx-auto"
                                                    src="{{ image_placeholder($brand->logo) }}"
                                                    data-src="{{ RvMedia::getImageUrl($brand->logo, null, false, RvMedia::getDefaultImage()) }}"
                                                    alt="{{ $brand->name }}" />
                                            </div>
                                        </div>
                                        <div class="brand__text py-3">
                                            <h4 class="h6 fw-bold text-secondary text-uppercase brand__name">
                                                {{ Str::limit($brand->name, 70) }}
                                            </h4>
                                            <div class="h5 fw-bold brand__desc">
                                                <div>
                                                    {!! BaseHelper::clean(Str::limit($brand->description, 150)) !!}
                                                </div>
                                            </div>
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
