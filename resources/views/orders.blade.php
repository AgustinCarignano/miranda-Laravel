@extends('layout')
@section('title','Orders')
@section('pageHeader')
@parent
@section('pageTitle','Your orders')
@section('pageBread','Orders')
@endsection
@section('content')
<section class="pageOrderNew">
    <h2 class="pageOrderNew__title">New Order</h2>
    <form class="pageOrderNew__form" method="post" id="orderForm">
        @if ($errors->any())
        <span class="pageContactForm__form__errorMsg">Error: Check the remark field</span>
        @endif
        @csrf
        <div class="pageOrderNew__form__item @error('type') pageOrderNew__form__inputError @enderror" data-name="type">
            <input type="text" name="type" value="{{old('type')}}" id="order_type" placeholder="What do you want to Order" autofocus />
            <img src="images/contact/bookIcon.svg" alt="" />
        </div>
        <div class="pageOrderNew__form__item-textarea @error('description') pageOrderNew__form__inputError @enderror" data-name="description">
            <textarea name="description" value="{{old('description')}}" id="order_description" cols="30" rows="10" placeholder="Tell us what you need"></textarea>
            <img src="images/contact/penIcon.svg" alt="" />
        </div>
        <input class="button button-variant1" type="submit" value="SEND" />
    </form>
    @if ($status = Session::get('success'))
    <div class="pageContactForm__modalContainer" id="orderModal">
        <div class="pageContactForm__modal">
            <h2 class="pageContactForm__modal__title">
                ¡Thank you for contact us!
            </h2>
            <p class="pageContactForm__modal__text">
                We have received it correctly. <br />
                Someone from our Team will get <br />
                back to you very soon.
            </p>
            <button class="button button-variant1 pageContactForm__modal__btn" id="orderModalBtn">
                ACEPT
            </button>
        </div>
    </div>
    @endif
</section>
<section class="pageOrderLast">
    @if(count($orders))
    <h2 class="pageOrderLast__title">Your Last Orders</h2>
    <div class="pageOrderLast__orders">
        @foreach($orders as $order)
        <div class="pageOrderLast__itemContainer">
            <div class="pageOrderLast__actionsContainer">
                <span class="pageOrderLast__orderStatus pageOrderLast__orderStatus-inProgress">Status</span>
                <form action="">
                    <select class="pageOrderLast__selectInput__select" name="actions" id="orderActions">
                        <option class='pageOrderLast__selectInput__option' value="" hidden>Actions</option>
                        <option class='pageOrderLast__selectInput__option' value="repeat">Repeat</option>
                        <option class='pageOrderLast__selectInput__option' value="cancel">Cancel</option>
                    </select>
                </form>
            </div>
            <h4 class="pageOrderLast__type">{{$order['type']}}</h4>
            <p class="pageOrderLast__description">{{$order['description']}}</p>
            <p class="pageOrderLast__timestamp">{{$order['created_at']}}</p>
        </div>
        @endforeach
    </div>
    @endif
</section>
@endsection
@section('extraScript')
<script src="JS/order.js"></script>
@endsection