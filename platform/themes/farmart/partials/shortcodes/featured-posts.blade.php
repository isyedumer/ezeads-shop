@php
    $slickConfig = [
        'arrows' => false,
        'dots' => false,
        'autoplay' => false,
        'infinite' => false,
        'autoplaySpeed' => 3000,
        'speed' => 800,
        'slidesToShow' => 2,
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
                    'slidesToShow' => 1,
                ],
            ],
        ],
    ];
    
    if (!$shortcode->app_enabled) {
        $slickConfig['slidesToShow'] = 3;
    }
    
    $posts = get_featured_posts(!$shortcode->app_enabled ? 3 : 2, ['author', 'categories:id,name', 'categories.slugable']);
@endphp
<div class="widget-blog py-3 lazyload"
    @if ($shortcode->bg) data-bg="{{ RvMedia::getImageUrl($shortcode->bg) }}" @endif>
    <div class="container wide">
        {{-- Custom Hide Row --}}
        <div class="row d-none">
            <div class="@if ($shortcode->app_enabled) col-lg-8 @else col-12 @endif py-4 py-lg-0">
                <div class="row justify-content-between align-items-center">
                    <h2 class="col-auto mb-0 py-2">{!! BaseHelper::clean($shortcode->title) !!}</h2>
                    <a class="col-auto" href="{{ get_blog_page_url() }}">
                        <span class="link-text">{{ __('All Articles') }}
                            <span class="svg-icon">
                                <svg>
                                    <use href="#svg-icon-chevron-right" xlink:href="#svg-icon-chevron-right"></use>
                                </svg>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="col slick-slides-carousel widget-blog-container position-relative"
                    data-slick="{{ json_encode($slickConfig) }}">
                    @foreach ($posts as $post)
                        <article class="post-item-wrapper">
                            <div class="card post-item__inner">
                                <div class="row g-0">
                                    <div class="col-md-4 post-item__image">
                                        <a class="img-fluid-eq" href="{{ $post->url }}">
                                            <div class="img-fluid-eq__dummy"></div>
                                            <div class="img-fluid-eq__wrap">
                                                <img class="lazyload" alt="{!! BaseHelper::clean($post->name) !!}"
                                                    src="{{ image_placeholder($post->image) }}"
                                                    data-src="{{ RvMedia::getImageUrl($post->image, null, false, RvMedia::getDefaultImage()) }}">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-8 post-item__content">
                                        <div>
                                            <div class="entry-meta">
                                                @if ($post->author)
                                                    <div class="entry-meta-author">
                                                        <span>{{ __('By') }}</span>
                                                        <strong>{{ $post->author->name }}</strong>
                                                    </div>
                                                @endif
                                                @if ($post->categories->count())
                                                    <div class="entry-meta-categories">
                                                        <span>{{ __('in') }}</span>
                                                        <a
                                                            href="{{ $post->firstCategory->url }}">{{ $post->firstCategory->name }}</a>
                                                    </div>
                                                @endif
                                                <div class="entry-meta-date">
                                                    <span>{{ __('on') }}</span>
                                                    <time>{{ $post->created_at->translatedFormat('M d, Y') }}</time>
                                                </div>
                                            </div>
                                            <div class="entry-title mb-3 mt-2">
                                                <h4><a href="{{ $post->url }}">{!! BaseHelper::clean($post->name) !!}</a></h4>
                                            </div>
                                            <div class="entry-description">
                                                <p>{{ Str::words($post->description, 20) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
            @if ($shortcode->app_enabled)
                <div class="col-lg-4 py-4 py-lg-0">
                    <div class="widget-wrapper widget-mobile-apps h-100 lazyload"
                        @if ($shortcode->app_bg) data-bg="{{ RvMedia::getImageUrl($shortcode->app_bg) }}" @endif>
                        <div class="widget-header text-center me-0">
                            <h2>{!! BaseHelper::clean($shortcode->app_title) !!}</h2>
                        </div>
                        <div class="widget-subtitle text-center">
                            <p class="my-3">{!! BaseHelper::clean($shortcode->app_description) !!}</p>
                            <div>
                                @if ($shortcode->app_ios_img && $shortcode->app_ios_link)
                                    <a href="{{ url($shortcode->app_ios_link) }}">
                                        <img class="my-4 mx-2 lazyload"
                                            data-src="{{ RvMedia::getImageUrl($shortcode->app_ios_img) }}">
                                    </a>
                                @endif
                                @if ($shortcode->app_android_img && $shortcode->app_android_link)
                                    <a href="{{ url($shortcode->app_android_link) }}">
                                        <img class="my-4 mx-2 lazyload"
                                            data-src="{{ RvMedia::getImageUrl($shortcode->app_android_img) }}">
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        {{-- Custom Add Sign in Sectiobn --}}
        <div class="content-box layout-section my-3">
            <div class="row row-featured row-featured-category">
                <div class="col-xl-12">
                    <section class="moduleWrapper-4129463801 signInMarketing-4274934412"
                        aria-labelledby="signin-cta-home" data-qa-id="SignInBanner">
                        <h2 class="signInMarketingHeading-549877605" id="signin-cta-home">Ezead Store better when you
                            are a
                            member
                        </h2>
                        <p class="signInMarketingBody-2245658267">See more relevant listings, find what you are looking
                            for
                            quicker, and more!</p>
                        @if (!auth('customer')->check())
                            <a href="#"
                                class="custom-auth link-3970392289 link__default-1151936189 signInMarketingButton-2828027866"
                                data-bs-toggle="modal" data-bs-target="#loginModal">
                                Sign In
                            </a>
                        @else
                            <a href="{{ route('marketplace.vendor.become-vendor') }}"
                                class="link-3970392289 link__default-1151936189 signInMarketingButton-2828027866">
                                Start Now
                            </a>
                        @endif
                    </section>
                </div>
            </div>
        </div>

    </div>
</div>
