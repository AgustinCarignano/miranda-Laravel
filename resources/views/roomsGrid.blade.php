@extends('layout')
@section('title','Rooms')
@section('pageHeader')
@parent
@section('pageTitle', 'Ultimate Rooms')
@section('pageBread','Rooms')
@endsection
@section('content')
<section class="pageRoomsGrid">
    <div class="pageRoomsGrid__container">
        <div class="pageRoomsGrid__selectInput">
            <form method="get">
                <select class="pageRoomsGrid__selectInput__select" name="priceOrder" id="priceOrder" onchange="this.form.submit()">
                    <option class="pageRoomsGrid__selectInput__option" value="" hidden>
                        Order by price
                    </option>
                    @if($order === 'ASC')
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
        <div class="pageRoomsGrid__room">
            <div class="pageRoomsGrid__img">
                <img src="{{$room->photos[0]}}" alt="" />
            </div>
            <div class="pageRoomsGrid__iconsBar">
                @foreach ($icons as $icon)
                <img src="images/{{$icon}}.svg" alt="" />
                @endforeach
            </div>
            <div class="pageRoomsGrid__legend">
                <h3 class="pageRoomsGrid__legend-title">{{$room->roomType}}</h3>
                <p class="pageRoomsGrid__legend-text">
                    {{Helpers::text_limit($room->description,140,"...")}}
                </p>
                <p class="pageRoomsGrid__legend-price">
                    ${{$room->price}}/Night &nbsp<a href="roomDetails?id={{$room->_id}}">&nbsp Book Now</a>
                </p>
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