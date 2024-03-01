<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    /* Start Custom Css */

    /* Start Light Mode */

    .light {
        background: #ffffff;
    }

    .light .custom-header-bottom-bg {
        background: #ffffff !important;
    }

    .light .custom-navbar .nav-item .nav-link {
        color: #0000008c !important;
    }

    .light .custom-navbar .navbar-nav li .nav-link :hover::after {
        background-color: #737373 !important;
    }

    .light .custom-menu--product-categories {
        color: #0000008c !important;
    }

    .light .widget-blog {
        background-color: #fff;
    }

    /* End Light Mode */

    body {
        background: #d9dadf;
    }

    .custom-menu--product-categories {
        padding: 0.5rem 0.5rem;
        background-color: white;
        color: var(--primary-color);
    }

    .custom-header-bottom-bg {
        background: #d9dadf !important;
    }

    /* Start Header Custom Login, Register and AuthName */

    /* Dark Mode */
    .dark a.custom-auth {
        color: var(--primary-color);
        font-weight: 600;
        font-size: 15px;
    }

    .dark a.custom-auth:hover {
        text-decoration: underline;
    }

    .dark .custom-auth-icons i.fas.fa-user-circle {
        color: var(--primary-color);
        font-size: 14px;
    }

    /* Light Mode */
    .light a.custom-auth {
        color: #0000008c;
        font-weight: 600;
        font-size: 15px;
    }

    .light a.custom-auth:hover {
        text-decoration: underline;
    }

    .light .custom-auth-icons i.fas.fa-user-circle {
        color: #737373;
        font-size: 14px;
    }

    /* Start Dropdown Logout */

    /* Dark Mode */
    .dark .dropdown .dropdown-toggle {
        color: var(--primary-color);
    }

    /* Light Mode */
    .light .dropdown .dropdown-toggle {
        color: #737373;
    }

    .dropdown .dropdown-menu {
        min-width: 8rem;
    }

    .dropdown:hover>.dropdown-menu {
        display: block;
    }

    .dropdown>.dropdown-toggle:active {
        pointer-events: none;
    }

    /* End Dropdown Logout */

    /* End Header Custom Login, Register and AuthName */

    /* .form-group--icon:before {
        content: "\f00a";
        font-family: Font Awesome\ 5 Free;
        font-weight: 900;
        position: absolute;
        right: 660px;
        padding: 5px 0px 0px 0px;
        color: #777;
    } */

    .Home-page-title h1 {
        font-family: "Open Sans Condensed",Helvetica,Arial,sans-serif;
        font-weight: 700;
        font-size: 48px;
    }

    .menu--product-categories .menu__content {
        border-top: 7px solid transparent;
    }

    .wide {
        max-width: 1250px !important;
    }

    .custom-box-shadow:focus {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, .25) !important;
    }

    .caretgories-background-image {
        background-image: url(/vendor/core/core/base/custom-images/banner-background.png);
        min-height: 170px;
        background-size: cover;
        position: relative;
        background-position: center;
    }

    .custom-widget-header {
        padding-left: 546px;
    }

    /* Banner */
    .banner-heading {
        font-family: Roboto, Helvetica, Arial, sans-serif;
        font-size: 22px;
        line-height: 26px;
        color: #fff;
        font-weight: 500
    }

    .banner-heading span {
        color: #131019
    }

    .banner {
        width: 100%;
        background: #d85200;
        min-height: 220px;
        display: flex;
        position: relative
    }

    .banner .wide .row {
        width: 100%
    }

    .banner-background {
        background-image: url(/vendor/core/core/base/custom-images/banner-background.png);
        min-height: 170px;
        background-size: cover;
        position: relative;
        background-position: center
    }

    .header-text {
        padding: 16px 64px 16px 68px !important;
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        align-content: center;
        justify-content: center;
        align-items: center;
        box-shadow: 0 2px 12px 0 rgb(11 12 31 / 50%)
    }

    .header-image {
        padding: 24px 0 24px 88px
    }

    .image-link {
        height: 220px;
        border-radius: 12px;
        box-shadow: 0 2px 10px 0 rgb(11 12 31 / 50%);
        margin: 0 4px;
        min-width: unset;
        padding-bottom: unset;
        box-sizing: border-box;
        display: block;
        flex-grow: 1;
        overflow: hidden;
        position: relative;
        text-align: center;
        width: 100%
    }

    .inner-header {
        height: 100%;
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        align-content: center;
        justify-content: center;
        align-items: center
    }

    .links-custom {
        background-color: hsla(0, 0%, 100%, .9);
        color: #d85200;
        font-size: 18px;
        font-weight: 700;
        line-height: 20px;
        padding: 5px 10px
    }

    .links-custom:hover {
        background-color: #d85200;
        color: hsla(0, 0%, 100%, .9)
    }

    .links-custom-popular {
        color: #fff;
        background-color: #d85200;
        position: absolute;
        font-size: 14px;
        font-weight: 700;
        line-height: 16px;
        padding: 5px;
        top: 50%
    }

    .links-custom-popular:hover {
        color: #d85200;
        background-color: #fff
    }

    /* Custom Categories */
    .custom-categories {
        list-style-type: none !important;
    }

    /* Custom Sign in Section */

    .signInMarketing-4274934412 {
        border-radius: 4px;
        background-color: #d85200;
        color: #fff;
        padding: 30px;
        text-align: center
    }

    .signInMarketingHeading-549877605 {
        font-size: 22px;
        font-weight: 700;
        line-height: 26px;
        margin-bottom: 10px;
        margin-top: 0
    }

    .signInMarketingBody-2245658267 {
        font-size: 16px;
        font-weight: 400;
        line-height: 22px;
        margin-bottom: 25px;
        margin-top: 0
    }

    .button__futureSecondary-3729380201:hover,
    .signInMarketingButton-2828027866:hover {
        background-color: #d85200;
        color: #fff !important
    }

    .signInMarketingButton-2828027866 {
        border-radius: 4px;
        font-size: 16px;
        font-weight: 400;
        line-height: 26px;
        background-color: #fff;
        border: 1px solid #fff;
        color: #d85200;
        display: inline-block;
        padding: 15px 35px;
        text-decoration: none
    }

    /* Custom Add Navbar */
    .custom-navbar .nav-item {
        padding: 0px 26px 0px 0px;
    }

    /* Custom Add Navbar */
    .custom-navbar .nav-item .nav-link {
        color: #d85200;
        font-weight: 500;
    }

    /* Add colored underline effect to links on hover */
    .custom-navbar .navbar-nav li .nav-link {
        font-size: 14px;
        position: relative;
        text-decoration: none;
        /* Remove default underline */
    }

    .custom-navbar .navbar-nav li .nav-link :hover::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -10px;
        width: 100%;
        height: 4px;
        background-color: #d85200;
    }

    .navbar-light .navbar-nav .nav-link:hover {
        color: #d85200;
    }

    .themeModeLI {
        position: absolute;
        right: 0px;
    }

    #footer .footer-info .wide .col-xl-2 {
        width: 25%;
    }

    .dark .widget-blog {
        background-color: #d9dadf;
    }

    .dark .product-inner .product-bottom-box {
        background-color: #f3f3f3;
    }

    .slick-slides-carousel .product-inner {
        background-color: #f3f3f3;
    }

    .navigation__right {
        padding: 0px 132px 0px 0px;
    }

    /* End Custom Css */
</style>
