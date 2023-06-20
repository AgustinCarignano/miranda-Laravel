<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('styles.css') }}" />
    <title>@yield('title')</title>
</head>

<body id="@yield('bodyId')">
    <header class="header">
        <div class="header__container">
            <p class="header__welcomeTextDesktop">We Make You Feel Comfortable</p>
            <nav class="header__navbar topPageBehavior" id="navbar">
                <div class="header__navbar__menu" id="burgerBtn">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="header__navbar__brand">
                    <a href="/">
                        <span class="header__navbar__brand-logo">H</span>
                    </a>
                    <a href="/">
                        <p class="header__navbar__brand-text"><b>HOTEL</b> MIRANDA</p>
                    </a>
                </div>
                <ul class="header__navbar__linkList desktopNavbar">
                    <li class="header__navbar__link">
                        <a href="/aboutUs">About Us</a>
                    </li>
                    <li class="header__navbar__link">
                        <a href="/roomsGrid">Rooms</a>
                    </li>
                    <li class="header__navbar__link">
                        <a href="/offers">Offers</a>
                    </li>
                    <li class="header__navbar__link">
                        <a href="/contact">Contact</a>
                    </li>
                    <li class="header__navbar__link">
                        <a href="/orders">Orders</a>
                    </li>
                </ul>
                <div class="header__navbar__buttons">
                    <a href="/profile">
                        <figure class="header__navbar__buttons-icon">
                            <img src="images/userIcon.svg" alt="user icon" />
                        </figure>
                    </a>
                    <figure class="header__navbar__buttons-icon">
                        <img src="images/searchIcon.svg" alt="search icon" />
                    </figure>
                </div>
            </nav>
            <ul class="header__navbar__linkList mobileNavbar initialHidden hidden" id="mobileNavbar">
                <li class="header__navbar__link">
                    <a href="/aboutUs">About Us</a>
                </li>
                <li class="header__navbar__link">
                    <a href="/roomsGrid">Rooms</a>
                </li>
                <li class="header__navbar__link">
                    <a href="/offers">Offers</a>
                </li>
                <li class="header__navbar__link">
                    <a href="/contact">Contact</a>
                </li>
                <li class="header__navbar__link">
                    <a href="/orders">Orders</a>
                </li>
            </ul>
        </div>
    </header>

    <main>
        @section('banner')
        @show
        @section('pageHeader')
        <section class="pagesHeader">
            <div class="pagesHeader__background">
                <div class="pagesHeader__container">
                    <h4 class="homeSubtitle pagesHeader__subtitle">
                        THE ULTIMATE LUXURY
                    </h4>
                    <h1 class="homeTitle pagesHeader__title">@yield('pageTitle')</h1>
                    <div class="pagesHeader__breadcrumbs">
                        <a href="/">Home &nbsp</a>
                        |
                        <a class="active" href="{{parse_url($_SERVER['REQUEST_URI'])['path']}}@yield('pageBreadPath')">&nbsp @yield('pageBread')</a>
                    </div>
                </div>
            </div>
        </section>
        @show
        @section('content')
        @show
    </main>

    <footer class="footer">
        <div class="footer__mapContainer">
            <div class="footer__column1">
                <div class="footer__brand">
                    <span class="footer__brand-logo">H</span>
                    <p class="footer__brand-text"><b>HOTEL</b> MIRANDA</p>
                </div>
                <p class="footer__column1-text">
                    Lorem ipsum dolor sit amet, consect etur adipisicing elit, sed doing
                    eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                    ad minim veniam, quis nostrud exercitat ion ullamco laboris nisi.
                </p>
                <div class="footer__column1-icons">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" fill="#F8F8F8" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M29.0678 8C30.6861 8 32 9.31391 32 10.9322V29.0678C32 30.6861 30.6861 32 29.0678 32H24.0771V22.9571H27.199L27.793 19.0843H24.0771V16.571C24.0771 15.5114 24.5961 14.4786 26.2605 14.4786H27.95V11.1815C27.95 11.1815 26.4167 10.9198 24.9508 10.9198C21.8905 10.9198 19.8902 12.7746 19.8902 16.1325V19.0843H16.4884V22.9571H19.8902V32H10.9322C9.31391 32 8 30.6861 8 29.0678V10.9322C8 9.31391 9.31386 8 10.9322 8H29.0678V8Z" fill="#777777" />
                    </svg>
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" fill="#F8F8F8" />
                        <path d="M29 32H11C9.344 32 8 30.656 8 29V11C8 9.344 9.344 8 11 8H29C30.656 8 32 9.344 32 11V29C32 30.656 30.656 32 29 32ZM17.216 26.096C22.874 26.096 25.97 21.404 25.97 17.342C25.97 17.21 25.97 17.078 25.964 16.946C26.564 16.514 27.086 15.968 27.5 15.35C26.948 15.596 26.354 15.758 25.73 15.836C26.366 15.458 26.852 14.852 27.086 14.132C26.492 14.486 25.832 14.738 25.13 14.876C24.566 14.276 23.768 13.904 22.886 13.904C21.188 13.904 19.808 15.284 19.808 16.982C19.808 17.222 19.838 17.456 19.886 17.684C17.33 17.558 15.062 16.328 13.544 14.468C13.28 14.924 13.13 15.452 13.13 16.016C13.13 17.084 13.676 18.026 14.498 18.578C13.994 18.56 13.52 18.422 13.106 18.194V18.236C13.106 19.724 14.168 20.972 15.572 21.254C15.314 21.326 15.044 21.362 14.762 21.362C14.564 21.362 14.372 21.344 14.186 21.308C14.576 22.532 15.716 23.42 17.06 23.444C16.004 24.272 14.678 24.764 13.238 24.764C12.992 24.764 12.746 24.752 12.506 24.722C13.862 25.586 15.482 26.096 17.216 26.096Z" fill="#777777" />
                    </svg>
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" fill="#F8F8F8" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M29.0678 8C30.6861 8 32 9.31391 32 10.9322V29.0678C32 30.6861 30.6861 32 29.0678 32H10.9322C9.31391 32 8 30.6861 8 29.0678V10.9322C8 9.31391 9.31386 8 10.9322 8H29.0678V8ZM29.3605 23.4995C29.4035 22.8515 29.3508 22.2328 29.2008 21.6404C29.0494 21.047 28.8066 20.518 28.4667 20.0556C28.1263 19.5922 27.6927 19.2221 27.1646 18.9487C26.6338 18.6718 26.0156 18.536 25.3091 18.536C24.6691 18.536 24.0912 18.6496 23.5671 18.8755C23.0435 19.1027 22.5939 19.4134 22.2144 19.8071C21.8359 20.1985 21.5474 20.6653 21.3397 21.2064C21.1355 21.7456 21.0312 22.3288 21.0312 22.9532C21.0312 23.5989 21.1316 24.1949 21.3308 24.7332C21.5323 25.2742 21.815 25.7349 22.1789 26.1245C22.5526 26.5129 22.9964 26.8102 23.5276 27.0228C24.0593 27.2323 24.6514 27.3388 25.3091 27.3388C26.253 27.3388 27.0625 27.1227 27.7269 26.6891C28.3993 26.2568 28.8914 25.5392 29.2163 24.534H27.1961C27.118 24.7923 26.9156 25.0413 26.5832 25.2742C26.2477 25.5077 25.8483 25.6244 25.3858 25.6244C24.7423 25.6244 24.2457 25.4558 23.9018 25.1203C23.5574 24.7847 23.3346 24.1599 23.3346 23.4995H29.3605ZM16.2142 27.1227C16.7317 27.1227 17.2363 27.0575 17.7222 26.9287C18.214 26.7996 18.652 26.6007 19.0341 26.3305C19.4132 26.0624 19.7207 25.715 19.9466 25.2862C20.1707 24.8624 20.2826 24.3591 20.2826 23.7742C20.2826 23.0526 20.1108 22.4375 19.7607 21.9231C19.4123 21.4123 18.8859 21.0532 18.1772 20.8491C18.6978 20.6023 19.0879 20.285 19.3532 19.898C19.6173 19.5102 19.7487 19.0251 19.7487 18.4446C19.7487 17.908 19.6603 17.454 19.485 17.0915C19.3048 16.7235 19.0532 16.4315 18.7319 16.2118C18.4053 15.9921 18.0196 15.8319 17.567 15.7361C17.112 15.6371 16.6141 15.5896 16.0625 15.5896H10.625V27.1227H16.2142ZM15.9249 21.9826C16.4712 21.9826 16.9154 22.1082 17.2492 22.3611C17.5816 22.6172 17.7493 23.0397 17.7493 23.6339C17.7493 23.9371 17.7001 24.1883 17.5976 24.3818C17.4955 24.5761 17.3544 24.7297 17.1848 24.8415C17.0144 24.9578 16.8133 25.0368 16.5861 25.0861C16.3625 25.1362 16.1246 25.1584 15.8747 25.1584H13.164V21.9826H15.9249ZM26.5375 20.7324C26.2646 20.4311 25.8035 20.2677 25.2402 20.2677C24.8737 20.2677 24.5705 20.3294 24.3274 20.455C24.0895 20.5793 23.8951 20.7333 23.7464 20.9152C23.5982 21.0998 23.4979 21.2951 23.4389 21.5037C23.3803 21.707 23.3448 21.8911 23.3346 22.054H27.0661C27.0115 21.4691 26.8113 21.0364 26.5375 20.7324ZM15.5401 17.5543C15.7651 17.5543 15.9839 17.5703 16.1934 17.6111C16.406 17.648 16.5897 17.7154 16.7521 17.8135C16.9154 17.908 17.0455 18.0425 17.1435 18.2147C17.2381 18.3869 17.2847 18.6088 17.2847 18.8768C17.2847 19.3606 17.1435 19.7125 16.8515 19.926C16.5564 20.1425 16.1836 20.2491 15.734 20.2491H13.164V17.5543H15.5401ZM27.54 17.5015V16.3636H22.865V17.5015H27.54Z" fill="#777777" />
                    </svg>
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" fill="#F8F8F8" />
                        <path d="M29.782 8H9.73748C8.77808 8 8 8.75952 8 9.6956V29.9747C8 30.9103 8.77808 31.6698 9.73748 31.6698H29.782C30.7428 31.6698 31.5209 30.9098 31.5209 29.9747V9.6956C31.5209 8.75904 30.7423 8 29.782 8ZM15.1293 27.8146H11.5768V17.1266H15.1293V27.8146ZM13.3533 15.6666H13.3295C12.1379 15.6666 11.3669 14.8457 11.3669 13.8201C11.3669 12.7718 12.1617 11.9737 13.3766 11.9737C14.592 11.9737 15.3397 12.7718 15.3634 13.8201C15.3634 14.8457 14.5916 15.6666 13.3533 15.6666ZM27.9398 27.8146H24.3873V22.0954C24.3873 20.6592 23.8733 19.6788 22.5879 19.6788C21.6067 19.6788 21.0223 20.3398 20.7648 20.9785C20.6711 21.2064 20.6482 21.5253 20.6482 21.8451V27.8142H17.0957C17.0957 27.8142 17.1423 18.1279 17.0957 17.1261H20.6482V18.639C21.1203 17.9109 21.9645 16.8739 23.8505 16.8739C26.1876 16.8739 27.9403 18.402 27.9403 21.6852V27.8146H27.9398Z" fill="#777777" />
                    </svg>
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="40" height="40" fill="#F8F8F8" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M29.0678 8C30.6861 8 32 9.31391 32 10.9322V29.0678C32 30.6861 30.6861 32 29.0678 32H10.9322C9.31391 32 8 30.6861 8 29.0678V10.9322C8 9.31391 9.31386 8 10.9322 8H29.0678V8ZM28.085 16.2327C27.8909 15.5066 27.3192 14.9348 26.5931 14.7408C25.277 14.3881 20 14.3881 20 14.3881C20 14.3881 14.723 14.3881 13.4069 14.7408C12.681 14.9348 12.1091 15.5066 11.915 16.2327C11.5625 17.5487 11.5625 20.2945 11.5625 20.2945C11.5625 20.2945 11.5625 23.0402 11.915 24.3561C12.1091 25.0821 12.681 25.6541 13.4069 25.8481C14.723 26.2006 20 26.2006 20 26.2006C20 26.2006 25.277 26.2006 26.5931 25.8481C27.3192 25.6541 27.8909 25.0821 28.085 24.3561C28.4375 23.0402 28.4375 20.2945 28.4375 20.2945C28.4375 20.2945 28.4375 17.5487 28.085 16.2327ZM18.3124 22.8258V17.7632L22.6966 20.2945L18.3124 22.8258Z" fill="#777777" />
                    </svg>
                </div>
            </div>
            <div class="footer__column2">
                <h2 class="footer__title">Services.</h2>
                <ul class="footer__list">
                    <li class="footer__list__link">Restaurant & Bar</li>
                    <li class="footer__list__link">Gaming Zone</li>
                    <li class="footer__list__link">Swimming Pool</li>
                    <li class="footer__list__link">Marrige Party</li>
                    <li class="footer__list__link">Wellness & Spa</li>
                    <li class="footer__list__link">Party Planning</li>
                    <li class="footer__list__link">Restaurant</li>
                    <li class="footer__list__link">Tour Consultancy</li>
                    <li class="footer__list__link">Conference Room</li>
                    <li class="footer__list__link">Coctail Party House</li>
                </ul>
            </div>
            <div class="footer__column3">
                <h2 class="footer__title">Contact Us.</h2>
                <div class="footer__contactData">
                    <img src="images/phoneIcon.svg" alt="" />
                    <div class="footer__contactData-cont">
                        <h4 class="footer__contactData-title">Phone Number</h4>
                        <p class="footer__contactData-text">+34 621 065 317</p>
                    </div>
                </div>
                <div class="footer__contactData">
                    <img src="images/emailIcon.svg" alt="" />
                    <div class="footer__contactData-cont">
                        <h4 class="footer__contactData-title">Email Address</h4>
                        <p class="footer__contactData-text">
                            agustin.carignano@gmail.com
                        </p>
                    </div>
                </div>
                <div class="footer__contactData">
                    <img src="images/mappinIcon.svg" alt="" />
                    <div class="footer__contactData-cont">
                        <h4 class="footer__contactData-title">Office Address</h4>
                        <p class="footer__contactData-text">
                            C. de la Princesa, 31, 2º<br />
                            28008 Madrid
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__legalContainer">
            <div class="footer__legalContainer__content">
                <h5 class="footer__legalContainer__text">
                    Copyrigth by Agustin Carignano - 2023
                </h5>
                <h5 class="footer__legalContainer__text">
                    <a class="footer__legalContainer__link" href="#">Terms of use &nbsp</a>
                    |
                    <a class="footer__legalContainer__link" href="#">&nbsp Privacy Environmental Policy</a>
                </h5>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="JS/index.js"></script>
    <script src="JS/menuBehaviour.js"></script>
    @section('extraScript')
    @show
</body>

</html>