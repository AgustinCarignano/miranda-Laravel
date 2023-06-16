@extends('layout')
@section('title','Rooms')
@section('pageHeader')
@parent
@section('pageTitle','Ultimate Room')
@section('pageBread','Rooms')
@endsection
@section('content')
<section class="pageRoomsList">
    <div class="pageRoomsList__container">
        <div class="pageRoomsList__selectInput">
            <form method="get">
                <input type="date" name="arrivalDate" value="{{$checkIn}}" hidden>
                <input type="date" name="departureDate" value="{{$checkOut}}" hidden>
                <select class="pageRoomsList__selectInput__select" name="priceOrder" id="priceOrder" onchange="this.form.submit()">
                    <option class="pageRoomsList__selectInput__option" value="" hidden>
                        Order by price
                    </option>
                    @if($order === "ASC")
                    <option class='pageRoomsGrid__selectInput__option' selected value='ASC'>
                        @else
                    <option class='pageRoomsGrid__selectInput__option' value='ASC'>
                        @endif
                        Ascendent
                    </option>
                    @if($order === 'DESC')
                    <option class='pageRoomsGrid__selectInput__option' selected value='DESC'>
                        @else
                    <option class='pageRoomsGrid__selectInput__option' value='DESC'>
                        @endif
                        Descendent
                    </option>
                </select>
            </form>
        </div>
        @foreach ($rooms as $room)
        <div class="pageRoomsList__room">
            <div class="pageRoomsList__img">
                <img src="{{$room->photos[0]}}" alt="" />
            </div>
            <div class="pageRoomsList__details">
                <div class="pageRoomsList__details-iconsBar">
                    @foreach ($icons as $icon)
                    <img src="images/{{$icon}}.svg" alt="" />
                    @endforeach
                </div>
                <h3 class="pageRoomsList__details-title">{{$room->roomType}}</h3>
                <p class="pageRoomsList__details-text">
                    {{Helpers::text_limit($room->description,200,"...")}}
                </p>
            </div>
            <div class="pageRoomsList__price">
                <p class="pageRoomsList__price-number">
                    ${{$room->price}}<small>/Night</small>
                </p>
                <hr />
                <a class="pageRoomsList__price-link" href="{{$baseUrl}}{{$room->_id}}">Book Now</a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="pageRoomsGrid__paginateBar">
        @foreach($rooms->linkCollection() as $item)
        @if(str_contains($item['label'], 'Prev')) <span><a href="{{$item['url']}}">&laquo;</a></span>
        @elseif(str_contains($item['label'], 'Next')) <span><a href="{{$item['url']}}">&raquo;</a></span>
        @else <span><a href="{{$item['url']}}">{{$item['label']}}</a></span>
        @endif
        @endforeach
    </div>
</section>
@endsection