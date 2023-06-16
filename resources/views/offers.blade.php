@extends('layout')
@section('title','Offers')
@section('pageHeader')
@parent
@section('pageTitle','Our Offers')
@section('pageBread','Offers')
@endsection
@section('content')
<section class="pageOffersList">
    @foreach ($rooms as $room)
    <div class="pageOffersList__container">
        <figure class="pageOffersList__img">
            <a href="roomDetails?id={{$room['_id']}}"><img class="pageOffersList__img-photo" src="{{$room['photos'][0]}}" alt="hotel room" /></a>
            <div class="pageOffersList__img-prices">
            </div>
        </figure>
        <div class="pageOffersList__detailContainer">
            <h4 class="homeSubtitle pageOffersList__subtitle">{{$room['roomType']}}</h4>
            <h2 class="homeTitle pageOffersList__title"><a href="roomDetails?id={{$room['_id']}}">Luxury {{$room['roomType']}}</a></h2>
            <div class="pageOffersList__prices">
                <div class="pageOffersList__prices-oldPrice">
                    <p>{{$room['price']}}</p>
                    <small>/Night</small>
                </div>
                <div class="pageOffersList__prices-newPrice">
                    <p>{{round($room['price'] * (1 - $room['discount'] / 100))}}</p>
                    <small>/Night</small>
                </div>
            </div>
            <hr />
            <p class="pageOffersList__text">
                {{$room['description']}}
            </p>
            <div class="pageOffersList__amenities-container">
                @foreach ($room['amenities'] as $amenity)
                <div class="pageOffersList__amenities-item">
                    <img src="{{$amenities[$amenity]}}" alt="" />
                    <p class="pageOffersList__amenities-text">{{$amenity}}</p>
                </div>
                @endforeach
            </div>
            <a href="roomDetails?id={{$room['_id']}}">
                <button class="button button-variant1">BOOK NOW</button>
            </a>
        </div>
    </div>
    @endforeach
</section>
<section class="pageOfferPopular">
    <div class="pageOfferPopular__container">
        <h4 class="pageOfferPopular__subtitle">POPULAR LIST</h4>
        <h2 class="pageOfferPopular__title">Popular Rooms</h2>
        <div class="pageOfferPopular__slider">
            <div class="swiper pageOfferPopular__slider__swiper">
                <div class="swiper-wrapper">
                    @foreach ($popularRooms as $room)
                    <div class="swiper-slide pageOfferPopular__slider-slide">
                        <img class="pageOfferPopular__slider-img" src="{{$room['photos'][0]}}" alt="" />
                        <div class="pageDetailsRelated__iconsBar">
                            <img src="/public/images/bedIcon.svg" alt="" />
                            <img src="/public/images/wifiIcon.svg" alt="" />
                            <img src="/public/images/carIcon.svg" alt="" />
                            <img src="/public/images/snowIcon.svg" alt="" />
                            <img src="/public/images/barbellIcon.svg" alt="" />
                            <img src="/public/images/nosmokeIcon.svg" alt="" />
                            <img src="/public/images/carIcon.svg" alt="" />
                        </div>
                        <div class="pageRoomsGrid__legend pageOfferPopular__slider__legend">
                            <h3 class="pageRoomsGrid__legend-title">{{$room['roomType']}}</h3>
                            <p class="pageRoomsGrid__legend-text">
                                {{text_limit($room['description'],80,".")}}
                            </p>
                            <p class="pageRoomsGrid__legend-price">
                                {{$room['price']}}/Night &nbsp<a href="roomDetails">&nbsp Book Now</a>
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
</section>
@endsection