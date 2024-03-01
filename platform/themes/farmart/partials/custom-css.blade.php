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
        font-family: "Open Sans Condensed", Helvetica, Arial, sans-serif;
        font-weight: 700;
        font-size: 36px;
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
        bottom: -1px;
        width: 100%;
        height: 2px;
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

    .product-inner {
        background-color: #f3f3f3;
    }

    .dropdown .dropdown-item {
        color: #999;
    }

    .dropdown .dropdown-menu.p-2 li {
        padding: 2px 0px;
    }

    .dropdown .dropdown-item i {
        color: #999 !important;
        font-size: 16px !important;
    }


    /* Start Mobile Custom Css */

    @media (max-width: 992px) {

        .custom-navbar {
            display: none;
        }

        #main-content .custom-header-bottom-bg .row.d-none {
            display: flex !important;
        }

        #main-content .custom-header-bottom-bg .row.d-none ul li.nav-item {
            padding: 4px;
        }

        #main-content .custom-header-bottom-bg .row.d-none ul li.nav-item a {
            color: #0000008c;
        }

        #main-content .custom-header-bottom-bg form {
            margin: 0px !important;
            padding: 0px !important;
        }

        #main-content .col-12.px-5.py-3.rounded {
            margin: 0px !important;
            padding: 0px !important;
        }

        #main-content .col-12.px-5.py-3.rounded span {
            display: none;
        }

        #main-content .col-12.px-5.py-3.rounded select {
            padding: 0px !important;
        }

        #main-content .col-12.px-5.py-3.rounded input,
        #main-content .col-12.px-5.py-3.rounded select {
            padding: 0px 0px 12px 0px !important;
        }

        #main-content .col-12.px-5.py-3.rounded input {
            margin: 0px !important;
        }

        #main-content .col-12.px-5.py-3.rounded .row.gx-1.gy-1 {
            padding: 24px;
        }

        /* .navigation__right {
            display: none;
        } */

        .banner .header-image {
            padding: 10px;
        }

        .banner .wide .row {
            width: unset;
        }

        .col-xs-12.col-sm-6.col-md-4.col-lg-2.px-1 {
            text-align: center;
        }
    }

    /* End Mobile Custom Css */

    /* Start Custom Add Coming Soon Css */
    .coming-soon {
        padding: 0;
        margin: 0;
        font-family: Tahoma, Geneva, Verdana, sans-serif;
        color: white;
        height: 270px;
    }

    .coming-soon {
        position: relative;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: url("https://eze.pics/coming-soon/construction.jpg") #08093cb3;
        background-size: cover;
        background-repeat: no-repeat;
        background-blend-mode: darken;
        /* filter: blur(10px); */
        z-index: -1;
    }

    .container-coming-soon {
        width: 600px;
        margin: auto;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .top p {
        font-size: 16px;
        width: 160px;
        text-align: center;
        color: white;
    }

    .top {
        display: flex;
        align-items: center;
        font-weight: 900;
        margin: 10px;
    }

    .container-coming-soon hr {
        width: 100px;
        color: white;
        border-radius: 5px;
        margin: 0 15px
    }

    .container-coming-soon h1 {
        font-size: 60px;
        text-align: center;
        font-weight: 500;
        letter-spacing: 2px;
    }

    .container-coming-soon h3 {
        margin-bottom: 10px;
    }

    .container-coming-soon a {
        color: white;
    }

    @media screen and (max-width:640px) {

        .container-coming-soon {
            width: 90%;
        }

        .container-coming-soon h1 {
            font-size: 50px;
        }
    }

    @media screen and (max-width:400px) {
        .container-coming-soonv h1 {
            font-size: 30px;
        }
    }
    /* End Custom Add Coming Soon Css */
    
    /* End Custom Css */
</style>
