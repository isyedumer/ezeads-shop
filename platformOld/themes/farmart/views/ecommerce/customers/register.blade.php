@php Theme::layout('full-width'); @endphp

{!! Theme::partial('page-header', ['withTitle' => false, 'size' => 'xl']) !!}
<div class="container">
    <div class="row customer-auth-page py-5 mt-5 justify-content-center">
        <div class="col-sm-9 col-md-6 col-lg-5 col-xl-10">
            <div class="customer-auth-form bg-light pt-1 py-3 px-4 border rounded">
                <nav>
                    <div class="nav nav-tabs">
                        {{-- <h1 class="nav-link fs-5 fw-bold">{{ __('Register An Account') }}</h1> --}}
                        {{-- custom register page --}}
                        <h1 class="nav-link fs-5 fw-bold">
                            <span class="svg-icon recent-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-user-plus" id="IconChangeColor">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" id="mainIconPathAttribute">
                                    </path>
                                    <circle cx="8.5" cy="7" r="4"></circle>
                                    <line x1="20" y1="8" x2="20" y2="14"></line>
                                    <line x1="23" y1="11" x2="17" y2="11"></line>
                                </svg>
                            </span>
                            Create your account. It's quick and easy.
                        </h1>
                    </div>
                </nav>
                
                {{-- custom register page --}}
                <h2>Member Standard Registration - Welcome - Sign up now - It's
                    FREE AND ALWAYS WILL BE!</h2>

                <p><span style="color: rgb(43, 43, 43);">PLEASE NOTE:<br>

                        All information (except your real name, email address and street
                        address) is prefilled in your listings pages to make listing extremely
                        easy and quick.<br>

                        Registrations received without accurate and complete information will
                        be deleted - we check and verify each and every registration.</span>
                    <br>

                    <span style="color: rgb(43, 43, 43);">This is done by IP
                        Location Verification - Telephone Prefix Location - Postal Code
                        Location Verification - and Occasionally Telephone Confirmation.</span>
                    <br>

                    <br>

                    <strong>We also do not accept free email addresses (Hotmail -
                        GMail - Mail.com etc) - Please use your service provider email address</strong><strong>.
                        We are sorry but too many scammers use these services!<br>

                    </strong><br>

                    If you do not have any service provider email -<a href="#"><span
                            style="text-decoration: underline;">
                            Contact </span></a>
                    and we will validate your information - set up a <strong>FREE
                        EZE.EMAIL</strong> account and activate your account.<br>

                    <br>

                    <span style="color: rgb(43, 43, 43);">We are sorry but to
                        keep the integrity of the Shop Ezead Community and avoid the scam issues and
                        problems of many other sites - this is required.</span><br>

                    <br>

                    <span style="color: rgb(43, 43, 43);">You have the option
                        of not displaying all or any of your personal information when listing
                        items - the choice is yours. YOU CONTROL YOUR CONTENT!<br>

                    </span> <br>

                    We also do not accept add spammers - nor pay to work&nbsp; or pay
                    in advance loan schemes - the ads and the poster will be immediately
                    removed.<span style="color: rgb(43, 43, 43);"></span>
                </p>

                <p class="page_instructions">( * ) indicates required
                    fields</p>
                <hr>
                
                <div class="tab-content my-3">
                    <div class="tab-pane fade pt-4 show active" id="nav-register-content" role="tabpanel"
                         aria-labelledby="nav-profile-tab">
                        <form method="POST" action="{{ route('customer.register.post') }}">
                            @csrf
                            <div class="input-group mb-3">
                                <input class="form-control @if ($errors->has('name')) is-invalid @endif"
                                       name="name" id="name-register" type="text" value="{{ old('name') }}" placeholder="{{ __('Your Name') }}">
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control @if ($errors->has('email')) is-invalid @endif"
                                       type="email" required="required" placeholder="{{ __('Email Address') }}"
                                       name="email" autocomplete="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control @if ($errors->has('password')) is-invalid @endif"
                                       type="password" placeholder="{{ __('Password') }}" aria-label="{{ __('Password') }}"
                                       autocomplete="new-password" name="password">
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <input class="form-control @if ($errors->has('password_confirmation')) is-invalid @endif"
                                       type="password" placeholder="{{ __('Password confirmation') }}" aria-label="{{ __('Password') }}" name="password_confirmation">
                                @if ($errors->has('password_confirmation'))
                                    <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
                                @endif
                            </div>
                            @if (is_plugin_active('marketplace'))
                                <div class="show-if-vendor" @if (old('is_vendor') != 1) style="display: none" @endif>
                                    @include(Theme::getThemeNamespace() . '::views.marketplace.includes.become-vendor-form')
                                </div>
                                <div class="vendor-customer-registration">
                                    <div class="form-check my-1">
                                        <input class="form-check-input" name="is_vendor" value="0" id="customer-role-register"
                                               type="radio" @if (old('is_vendor') != 1) checked="checked" @endif>
                                        <label class="form-check-label" for="customer-role-register">{{ __('I am a customer') }}</label>
                                    </div>
                                    <div class="form-check my-1 mb-3">
                                        <input class="form-check-input" id="vendor-role-register" value="1"
                                               type="radio" name="is_vendor" @if (old('is_vendor') == 1) checked="checked" @endif>
                                        <label class="form-check-label" for="vendor-role-register">{{ __('I am a vendor') }}</label>
                                    </div>
                                </div>
                            @endif
                            <div class="form-group">
                                <p>{{ __('Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.') }}</p>
                            </div>
                            <div class="form-check mb-3">
                                <input type="hidden" name="agree_terms_and_policy" value="0">
                                <input class="form-check-input" type="checkbox" name="agree_terms_and_policy" id="agree-terms-and-policy" value="1" @if (old('agree_terms_and_policy') == 1) checked @endif>
                                <label for="agree-terms-and-policy">{{ __('I agree to terms & Policy.') }}</label>
                                @if ($errors->has('agree_terms_and_policy'))
                                    <div class="mt-1">
                                        <span class="text-danger small">{{ $errors->first('agree_terms_and_policy') }}</span>
                                    </div>
                                @endif
                            </div>

                            @if (is_plugin_active('captcha') && setting('enable_captcha') && get_ecommerce_setting('enable_recaptcha_in_register_page', 0))
                                <div class="form-group mb-3">
                                    {!! Captcha::display() !!}
                                </div>
                            @endif
                            
                            
                            {{-- Custom Terms --}}
                            <div class="row mb-3">
                                <div class="custom-terms-register"
                                    style="overflow: scroll;border: 1px solid #b9b9b9;height: 500px;">
                                    <div class="container">
                                        <div class="section-content">
                                            <div class="row">

                                                <h1 class="text-center title-1 pt-3" style="color: ;">
                                                    <strong>Terms</strong>
                                                </h1>
                                                <hr class="center-block small mt-0" style="background-color: ;">

                                                <div class="col-md-12 page-content">

                                                    <div class="relative">
                                                        <div class="row">
                                                            <div class="col-sm-12 page-content">


                                                                <div class="text-content text-start from-wysiwyg">
                                                                    <h4><b>Definitions</b></h4>
                                                                    <p>Each of the terms mentioned below have in
                                                                        these Conditions of Sale Shop EzeAd
                                                                        Service (hereinafter the "Conditions")
                                                                        the
                                                                        following meanings:</p>
                                                                    <ol>
                                                                        <li>Announcement&nbsp;: refers to all
                                                                            the
                                                                            elements and data (visual, textual,
                                                                            sound, photographs, drawings),
                                                                            presented
                                                                            by an Advertiser editorial under his
                                                                            sole responsibility, in order to
                                                                            buy,
                                                                            rent or sell a product or service
                                                                            and
                                                                            broadcast on the Website and Mobile
                                                                            Site.</li>
                                                                        <li>Advertiser&nbsp;: means any natural
                                                                            or
                                                                            legal person, a major, established
                                                                            in
                                                                            France, holds an account and having
                                                                            submitted an announcement, from it,
                                                                            on
                                                                            the Website. Any Advertiser must be
                                                                            connected to the Personal Account
                                                                            for
                                                                            deposit and or manage its listings.
                                                                            Add
                                                                            first deposit automatically entails
                                                                            the
                                                                            establishment of a Personal Account
                                                                            to
                                                                            the Advertiser.</li>
                                                                        <li>Personal Account&nbsp;: refers to
                                                                            the
                                                                            free space than any Advertiser must
                                                                            create and which it should connect
                                                                            from
                                                                            the Website to disseminate, manage
                                                                            and
                                                                            view its listings.</li>
                                                                        <li>EzeAd&nbsp;: means the
                                                                            company
                                                                            that publishes and operates the
                                                                            Website
                                                                            and Mobile Site {YourCompany},
                                                                            registered at the Trade and
                                                                            Companies
                                                                            Register of {YourCity} under the
                                                                            number
                                                                            {YourCompany Registration Number}
                                                                            whose
                                                                            registered office is at {YourCompany
                                                                            Address}.</li>
                                                                        <li>Customer Service&nbsp;:
                                                                            Shop EzeAd
                                                                            means the department to which the
                                                                            Advertiser may obtain further
                                                                            information. This service can be
                                                                            contacted via email by clicking the
                                                                            link
                                                                            on the Website and Mobile Site.</li>
                                                                        <li>Shop EzeAd Service&nbsp;:
                                                                            Shop EzeAd means the services
                                                                            made
                                                                            available to Users and Advertisers
                                                                            on
                                                                            the Website and Mobile Site.</li>
                                                                        <li>Website&nbsp;: means the website
                                                                            operated by Shop EzeAd accessed
                                                                            mainly from the URL <a
                                                                                href="https://shop.ezead.com/">https://shop.ezead.com/</a>
                                                                            and allowing Users and Advertisers
                                                                            to
                                                                            access the Service via internet
                                                                            Shop EzeAd.</li>
                                                                        <li>Mobile Site&nbsp;: is the mobile
                                                                            site
                                                                            operated by Shop EzeAd
                                                                            accessible
                                                                            from the URL <a
                                                                                href="https://shop.ezead.com/">https://shop.ezead.com/</a>
                                                                            and allowing Users and Advertisers
                                                                            to
                                                                            access via their mobile phone
                                                                            service
                                                                            {YourSiteName}.</li>
                                                                        <li>User&nbsp;: any visitor with access
                                                                            to
                                                                            Shop EzeAd Service via the
                                                                            Website
                                                                            and Mobile Site and Consultant
                                                                            Service
                                                                            Shop EzeAd accessible from
                                                                            different
                                                                            media.</li>
                                                                    </ol>
                                                                    <h4><b>Subject</b></h4>
                                                                    <p>These Terms and Conditions Of Use
                                                                        establish
                                                                        the contractual conditions applicable to
                                                                        any
                                                                        subscription by an Advertiser connected
                                                                        to
                                                                        its Personal Account from the Website
                                                                        and
                                                                        Mobile Site.<br></p>
                                                                    <h4><b>Acceptance</b></h4>
                                                                    <p>Any use of the website by an Advertiser
                                                                        is
                                                                        full acceptance of the current
                                                                        Terms.<br>
                                                                    </p>
                                                                    <h4><b>Responsibility</b></h4>
                                                                    <p>Responsibility for Shop EzeAd can not
                                                                        be
                                                                        held liable for non-performance or
                                                                        improper
                                                                        performance of due control, either
                                                                        because
                                                                        of the Advertiser, or a case of major
                                                                        force.<br></p>
                                                                    <h4><b>Modification of these terms</b></h4>
                                                                    <p>Shop EzeAd reserves the right, at any
                                                                        time, to modify all or part of the Terms
                                                                        and
                                                                        Conditions.</p>
                                                                    <p>Advertisers are advised to consult the
                                                                        Terms
                                                                        to be aware of the changes.</p>
                                                                    <h4><b>Miscellaneous</b></h4>
                                                                    <p>If part of the Terms should be illegal,
                                                                        invalid or unenforceable for any reason
                                                                        whatsoever, the provisions in question
                                                                        would
                                                                        be deemed unwritten, without questioning
                                                                        the
                                                                        validity of the remaining provisions
                                                                        will
                                                                        continue to apply between Advertisers
                                                                        and
                                                                        Shop EzeAd.</p>
                                                                    <p>Any complaints should be addressed to
                                                                        Customer Service Shop EzeAd.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-grid">
                                <button class="btn btn-primary" type="submit">{{ __('Register') }}</button>
                            </div>

                            <div class="mt-3">
                                <p class="text-center">{{ __('Already have an account?') }} <a href="{{ route('customer.login') }}" class="d-inline-block text-primary">{{ __('Log in') }}</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="bg-light pt-1 px-4 pb-3">
                {!! apply_filters(BASE_FILTER_AFTER_LOGIN_OR_REGISTER_FORM, null, \Botble\Ecommerce\Models\Customer::class) !!}
            </div>
        </div>
    </div>
</div>
