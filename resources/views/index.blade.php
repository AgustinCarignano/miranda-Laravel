@extends('layout')
@section('title','Hotel Miranda')
@section('bodyId','homePage')
@section('banner')
<section class="banner">
    <div class="banner__backgroundPres">
        <div class="banner__presentation">
            <h4 class="homeSubtitle banner__subtitle">
                THE ULTIMATE LUXURY EXPERIENCE
            </h4>
            <h1 class="banner__title homeTitle">The Perfect Base For You</h1>
            <div class="banner__buttons">
                <a href="#startTour">
                    <button class="banner__btn button button-variant1">
                        TAKE A TOUR
                    </button>
                </a>
                <a href="aboutUs">
                    <button class="banner__btn button button-variant2">
                        LEARN MORE
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div class="banner__backgroundForm">
        <div class="banner__formContainer">
            <form action="roomsList" class="banner__form">
                <div class="banner__form__inputContainer">
                    <label class="banner__form__label" for="arrivalDate">Arrival Date</label>
                    <input class="banner__form__dateInput" type="date" name="arrivalDate" id="arrivalDate" value="2023-03-24" />
                </div>
                <div class="banner__form__inputContainer">
                    <label class="banner__form__label" for="departureDate">Departure Date</label>
                    <input class="banner__form__dateInput" type="date" name="departureDate" id="departureDate" value="2023-03-30" />
                </div>
                <input class="button button-variant1" type="submit" value="CHECK AVAILABILITY" />
            </form>
        </div>
    </div>
</section>
@endsection
@section('pageHeader')
@endsection
@section('content')
<section class="aboutUs">
    <div class="aboutUs__presentation">
        <div class="aboutUs__container">
            <h4 class="homeSubtitle aboutUs__subtitle">ABOUT US</h4>
            <h2 class="homeTitle aboutUs__title">Discover Our Underground.</h2>
            <p class="aboutUs__text">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo consequat.
            </p>
            <a href="roomsGrid">
                <button class="button button-variant1">
                    BOOK NOW
                </button>
            </a>
        </div>
    </div>
    <div class="aboutUs__subSectionContainer">
        <div class="aboutUs__subSection aboutUs__subSection-variant1">
            <figure class="aboutUs__subSection__figure">
                <img src="images/pool.webp" alt="a hotel pool with palm trees" />
            </figure>
            <div class="aboutUs__subSection__salient aboutUs__subSection__salient-variant1">
                <h3 class="aboutUs__subSection__salient-title">Strong Team</h3>
                <p class="aboutUs__subSection__salient-text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                    eiusmod tempor.
                </p>
            </div>
        </div>
        <div class="aboutUs__subSection aboutUs__subSection-variant2">
            <figure class="aboutUs__subSection__figure">
                <img src="images/solarium.webp" title="source: imgur.com" />
            </figure>
            <div class="aboutUs__subSection__salient aboutUs__subSection__salient-variant2">
                <h3 class="aboutUs__subSection__salient-title">Luxury Room</h3>
                <p class="aboutUs__subSection__salient-text">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                    eiusmod tempor.
                </p>
            </div>
        </div>
    </div>
</section>
<section class="rooms">
    <h4 class="homeSubtitle rooms__subtitle">ROOMS</h4>
    <h2 class="homeTitle rooms__title">Hand Picked Rooms</h2>
    <div class="rooms__slider">
        <div class="swiper rooms__slider__swiper">
            <div class="swiper-wrapper">
                @foreach ($rooms as $room)
                <div class="swiper-slide">
                    <div class="rooms__slider__header">
                        @foreach ($icons as $icon)
                        <img src="images/{{$icon}}.svg" alt="" />
                        @endforeach
                    </div>
                    <img class="rooms__slider__swiper-img" src="{{$room['photos'][0]}}" alt="" />
                    <div class="rooms__slider__foot">
                        <div>
                            <h3 class="rooms__slider__foot-title">
                                {{$room['roomType']}}
                            </h3>
                            <p class="rooms__slider__foot-text">
                                {{text_limit($room['description'],200,"...")}}
                            </p>
                        </div>
                        <p class="rooms__slider__foot-price">
                            ${{$room['price']}}<small>/Night</small>
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
    <div class="rooms__video" id="startTour">
        <div class="rooms__video__container">
            <h5 class="homeSubtitle rooms__video__subtitle">INTRO VIDEO</h5>
            <h2 class="homeTitle rooms__video__title">
                Meet With Our Luxury Place.
            </h2>
            <p class="rooms__video__text">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo consequat you have to understand
                this.
            </p>
            <figure class="rooms__video__cont">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/Bu3Doe45lcU?start=25&amp;clip=UgkxMyTmoCzN3fCZ4ti72FPRWCmhwFXKE9_e&amp;clipt=EKjDARj4yQQ&autoplay=1&mute=1&loop=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </figure>
            <button class="button button-variant1">
                <a href="roomsGrid">
                    BOOK NOW
                </a>
            </button>
        </div>
    </div>
</section>
<section class="facilities">
    <h4 class="homeSubtitle facilities__subtitle">FACILITIES</h4>
    <h2 class="homeTitle facilities__title">Core Features</h2>
    <div class="swiperFacility">
        <div class="swiper-wrapper">
            @foreach ($facilities as $facility)
            <div class="swiper-slide">
                <div class="facilityActive">
                    <figure class="facilities__slider__imgs">
                        <img src="{{$facility['icon']}}" alt="" />
                        <span>{{$facility['number']}}</span>
                    </figure>
                    <h3 class="facilities__slider__title">{{$facility['name']}}</h3>
                    <p class="facilities__slider__text">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                        do eiusmod tempor incididunt ut labore et dolore magna..
                    </p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiperFacility-pagination facilities__slider__dots"></div>
    </div>
</section>
<section class="menu">
    <div class="menu__container">
        <h4 class="homeSubtitle menu__subtitle">MENU</h4>
        <h2 class="homeTitle menu__title">Our Foods Menu</h2>
        <div class="swiperFoodMenu menu__options">
            <div class="swiper-wrapper">
                @foreach ($menues as $menu)
                <div class="swiper-slide">
                    <div class="menu__options__column">
                        @foreach ($menu as $option)
                        @if ($option['id'] === 'menuOption1')
                        <?php $class = "menu__options__container menu__options-activeOption" ?>
                        @else
                        <?php $class = "menu__options__container" ?>
                        @endif
                        <div class="{{$class}}" id="{{$option['id']}}" data-path="{{$option['path']}}">
                            <figure class="menu__options__figure">
                                <img src="{{$option['img']}}" alt="" />
                            </figure>
                            <div class="menu__options__cont">
                                <h3 class="menu__options__title">{{$option['name']}}</h3>
                                <p class="menu__options__text">
                                    Lorem ipsum dolor sit amet, consectetur adip isicing
                                    elit, sed do eiusmod tempor.
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="menu__options__controls">
            <div class="swiperFoodMenu-button-prev menu__options__controls-container controlLeft">
                <div class="menu__options__controls-arrow arrowLeft"></div>
            </div>
            <div class="swiperFoodMenu-button-next menu__options__controls-container controlRight">
                <div class="menu__options__controls-arrow arrowRight"></div>
            </div>
        </div>

        <div class="swiperMenuOption menu__options__individualSlider">
            <div class="swiper-wrapper">
                @foreach($menues[0] as $option)
                <div class="swiper-slide">
                    <img class="menu__options__individualSlider-img" src="{{$option['img']}}" alt="" />
                </div>
                @endforeach
            </div>
            <div class="swiperMenuOption-pagination menu__options__individualSlider-dots"></div>
        </div>
    </div>
    <div class="menu__resume">
        <div class="menu__resume__items">
            <figure class="menu__resume__img">
                <img src="images/rocket.svg" alt="" />
            </figure>
            <h2 class="menu__resume__title">84k<small>+</small></h2>
            <p class="menu__resume__text">Projects are Completed</p>
        </div>
        <div class="menu__resume__items">
            <figure class="menu__resume__img">
                <img src="images/backers.svg" alt="" />
            </figure>
            <h2 class="menu__resume__title">10M<small>+</small></h2>
            <p class="menu__resume__text">Active Backers Around World</p>
        </div>
        <div class="menu__resume__items">
            <figure class="menu__resume__img">
                <img src="images/rise.svg" alt="" />
            </figure>
            <h2 class="menu__resume__title">02k<small>+</small></h2>
            <p class="menu__resume__text">Categories Served/p></p>
        </div>

        <div class="menu__resume__items">
            <figure class="menu__resume__img">
                <img src="images/book.svg" alt="" />
            </figure>
            <h2 class="menu__resume__title">100M<small>+</small></h2>
            <p class="menu__resume__text">Idea Rised Funds</p>
        </div>
    </div>
</section>
@endsection