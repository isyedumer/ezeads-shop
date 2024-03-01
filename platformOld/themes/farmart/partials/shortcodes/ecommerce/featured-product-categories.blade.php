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

{{-- Custom Add Categories --}}
@if ($categories->count())
    <div class="widget-product-categories pb-2">
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
                                            <div class="col-4">
                                                <!-- Your item content goes here -->
                                                <a href="{{ $item->url }}" class="pt-2 m-0">{{ $item->name }}</a>
                                                <hr>
                                            </div>
                                        @endif
                                        @php $count++; @endphp
                                        <!-- Increment the counter after each item -->
                                        @if ($count % 3 === 0)
                                            {{-- <div class="w-100"></div> --}}
                                            <!-- Add an empty div with w-100 to create a new row after every three items -->
                                        @endif
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
