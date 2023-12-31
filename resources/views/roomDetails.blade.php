@extends('layout')
@section('title','Room Details')
@section('pageHeader')
@parent
@section('pageTitle','Ultimate Room')
@section('pageBread',$room['roomNumber'])
@section('pageBreadPath',"?id=" . $room['_id'])
@endsection
@section('content')
<div class="pageDetailsLayout">
    <div class="pageDetailsLayout-block">
        <section class="pageDetailsPresentation">
            <div class="pageDetailsPresentation__container">
                <div class="pageDetailsPresentation__header">
                    <h4 class="homeSubtitle pageDetailsPresentation__subtitle">
                        {{$room['roomType']}}
                    </h4>
                    <h2 class="homeTitle pageDetailsPresentation__title">
                        Room {{$room['roomNumber']}}
                    </h2>
                </div>
                <div class="pageDetailsPresentation__prices {{$room['offer'] === 1 ? ' offerPrice' : ''}}">
                    <div class="pageDetailsPresentation__prices-item">
                        <p>${{$room['price']}}</p>
                        <small>/Night</small>
                    </div>
                    <div class=" pageDetailsPresentation__prices-item">
                        <p>${{round($room['price']*(1-($room['discount']/100)))}}</p>
                        <small>/Night</small>
                    </div>
                </div>
            </div>
            <figure class="pageDetailsPresentation__img">
                <img src="{{$room['photos'][0]}}" alt="offer hotel room" />
            </figure>
        </section>
        <section class="pageDetailsAvailability">
            <h3 class="pageDetailsAvailability__title">Check Availability</h3>
            <div class="pageDetailsAvailability__formContainer">
                <form class="pageDetailsAvailability__form" id="availabilityForm" method="post">
                    @if ($errors->any())
                    <span class="pageDetailsAvailability__form__errorMsg">Check the remark field</span>
                    @endif
                    @csrf
                    <label class="pageDetailsAvailability__form-label" for="detailsCheckIn">Check In</label>
                    <input class="pageDetailsAvailability__form-date @error('checkIn') pageContactForm__form__inputError @enderror" type="date" name="checkIn" id="detailsCheckIn" value="{{old('checkIn') ? old('checkIn') : $bookingsDates['checkIn']}}" />
                    <label class="pageDetailsAvailability__form-label" for="detailsCheckOut">Check Out</label>
                    <input class="pageDetailsAvailability__form-date @error('checkOut') pageContactForm__form__inputError @enderror" type="date" name="checkOut" id="detailsCheckOut" value="{{old('checkOut') ? old('checkOut') : $bookingsDates['checkOut']}}" />
                    <label class="pageDetailsAvailability__form-label" for="detailsGuest">Full Name</label>
                    <input class="pageDetailsAvailability__form-text @error('guest') pageContactForm__form__inputError @enderror" type="text" name="guest" id="detailsGuest" value="{{ old('guest') }}" placeholder="Type your name..." />
                    <label class="pageDetailsAvailability__form-label" for="detailsEmail">Email</label>
                    <input class="pageDetailsAvailability__form-text @error('email') pageContactForm__form__inputError @enderror" type="email" name="email" id="detailsEmail" value="{{ old('email') }}" placeholder="Type your email..." />
                    <label class="pageDetailsAvailability__form-label" for="detailsPhone">Phone</label>
                    <input class="pageDetailsAvailability__form-text @error('phone') pageContactForm__form__inputError @enderror" type="text" name="phone" id="detailsPhone" value="{{ old('phone') }}" placeholder="Type your phone..." />
                    <label class="pageDetailsAvailability__form-label" for="detailsMessage">Message (Special resquest)</label>
                    <textarea class="pageDetailsAvailability__form-text" name="message" id="detailsMessage" cols="30" rows="3" placeholder="Type your message...">{{ old('message') }}</textarea>
                    <input style="display: none" name="roomId" value="{{$room['_id']}}">
                    <input class="button button-variant1 pageDetailsAvailability__form-btn" type="submit" value="CHECK AVAILABILITY" />
                </form>
                @if ($status = Session::get('done'))
                <div class="pageDetailsAvailability__modalContainer" id="availabilityModal">
                    <div class="pageDetailsAvailability__modal">
                        <h2 class="pageDetailsAvailability__modal__title">
                            {{Helpers::$bookingMessage[$status]['title']}}
                        </h2>
                        <p class="pageDetailsAvailability__modal__text">
                            {{Helpers::$bookingMessage[$status]['content']}}
                        </p>
                        <button class="button button-variant1 pageDetailsAvailability__modal__btn" id="modalBtn">
                            ACEPT
                        </button>
                    </div>
                </div>
                @endif
            </div>
        </section>
        <section class="pageDetailsDescription">
            <p class="pageDetailsDescription__text">
                {{$room['description']}}
            </p>
        </section>
    </div>
    <section class="pageDetailsAmenities">
        <h2 class="pageDetailsAmenities__title">Amenities</h2>
        <hr />
        <div class="pageDetailsAmenities__container">
            @foreach (Helpers::$amenities as $name=>$img)
            <div class="pageDetailsAmenities__items">
                <img class="pageDetailsAmenities__items-img" src="{{$img}}" alt="" />
                <p class="pageDetailsAmenities__items-text">{{$name}}</p>
            </div>
            @endforeach
        </div>
    </section>
    <section class="pageDetailsPerson">
        <div class="pageDetailsPerson__avatar">
            <img class="pageDetailsPerson__avatar-person" src="images/avatar1.webp" alt="avatar" />
        </div>
        <img class="pageDetailsPerson__avatar-check" src="images/checkIcon.svg" alt="" />
        <h3 class="pageDetailsPerson__title">Rosalina D. William</h3>
        <h6 class="pageDetailsPerson__subtitle">FOUNDER, QUX CO.</h6>
        <p class="pageDetailsPerson__text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
            eiusmod tempor incididunt ut labore et dolore.
        </p>
    </section>
    <section class="pageDetailsCancellation">
        <h2 class="pageDetailsCancellation__title">Cancellation</h2>
        <hr />
        <p class="pageDetailsCancellation__text">
            Phasellus volutpat neque a tellus venenatis, a euismod augue
            facilisis. Fusce ut metus mattis, consequat metus nec, luctus
            lectus. Pellentesque orci quis hendrerit sed eu dolor. Cancel up to
            14 days to get a full refund.
        </p>
    </section>
    <section class="pageDetailsRelated">
        <h2 class="pageDetailsRelated__title">Related Rooms</h2>
        <hr />

        <div class="pageDetailsRelated__slider">
            <div class="swiperPageDetail pageDetailsRelated__slider__swiper">
                <div class="swiper-wrapper">
                    @foreach ($relatedRooms as $r_room)
                    <div class="swiper-slide pageDetailsRelated__slider-slide">
                        <img class="pageDetailsRelated__slider-img" src="{{$r_room['photos'][1]}}" alt="" />
                        <div class="pageDetailsRelated__iconsBar">
                            @foreach (Helpers::$icons as $icon)
                            <img src="images/{{$icon}}.svg" alt="" />
                            @endforeach
                        </div>
                        <div class="pageRoomsGrid__legend pageDetailsRelated__slider__legend">
                            <h3 class="pageRoomsGrid__legend-title">
                                {{$r_room['roomType']}}
                            </h3>
                            <p class="pageRoomsGrid__legend-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor.
                            </p>
                            <p class="pageRoomsGrid__legend-price">
                                ${{$r_room['price']}}/Night &nbsp<a href="/roomDetails?id={{$r_room['_id']}}">&nbsp Book Now</a>
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('extraScript')
<script src="JS/booking.js"></script>
@endsection