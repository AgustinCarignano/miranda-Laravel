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
        <!-- <div class="pageOrderNew__form__item @error('type') pageOrderNew__form__inputError @enderror" data-name="type">
            <input type="text" name="type" value="{{old('type')}}" id="order_type" placeholder="What do you want to Order" autofocus />
            <img src="images/contact/bookIcon.svg" alt="" />
        </div> -->
        <div class="pageOrderNew__form__select @error('type') pageOrderNew__form__inputError @enderror" data-name="type">
            <select name="type" id="order_type">
                <option value="" hidden>What do you want to order?</option>
                <option value="food">Food</option>
                <option value="other">Other</option>
            </select>
            <img src="images/contact/bookIcon.svg" alt="" />
        </div>
        <div class="pageOrderNew__form__select @error('room_id') pageOrderNew__form__inputError @enderror" data-name="room_id">
            <select name="room_id" id="order_room_id">
                <option value="" hidden>Select your room</option>
                @foreach ($rooms as $room)
                <option value="{{$room['_id']}}">{{$room['roomNumber']}} - {{$room['roomType']}}</option>
                @endforeach
            </select>
            <img src="images/contact/roomIcon.svg" alt="" />
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

                @if (Helpers::orderStatus($order['created_at']) === 'In progress')
                <span class="pageOrderLast__orderStatus pageOrderLast__orderStatus-inProgress">{{Helpers::orderStatus($order['created_at'])}}</span>
                <form class="pageOrderLast__actionsContainer__form editOrderForm" data-orderid="{{$order['id']}}" method="post" action="{{ route('orders.update') }}">
                    @csrf @method('put')
                    <input type="text" name="orderId" value="{{$order['id']}}" hidden />
                    <button class="pageOrderLast__actionsContainer__btn">
                        <img src="images/contact/penIcon.svg" alt="trash icon" />
                    </button>
                    <div class="pageContactForm__modalContainer pageContactForm__modalContainer-hidden" id="editOrderModal-{{$order['id']}}">
                        <div class="pageContactForm__modal">
                            <h2 class="pageContactForm__modal__title">
                                Edit your order
                            </h2>

                            <div class="pageOrderNew__form__select @error('type') pageOrderNew__form__inputError @enderror" data-name="type">
                                <select name="type" id="order_type">
                                    <option value="food" {{$order['type']==='food' ? 'selected' : '' }}>Food</option>
                                    <option value="other" {{$order['type']==='other' ? 'selected' : '' }}>Other</option>
                                </select>
                                <img src="images/contact/bookIcon.svg" alt="" />
                            </div>
                            <div class="pageOrderNew__form__select @error('room_id') pageOrderNew__form__inputError @enderror" data-name="room_id">
                                <select name="room_id" id="order_room_id">
                                    <option value="" hidden>Select your room</option>
                                    @foreach ($rooms as $room)
                                    <option value="{{$room['_id']}}" {{$order['room_id'] === $room['_id'] ? 'selected' : '' }}>{{$room['roomNumber']}} - {{$room['roomType']}}</option>
                                    @endforeach
                                </select>
                                <img src="images/contact/roomIcon.svg" alt="" />
                            </div>
                            <div class="pageOrderNew__form__item-textarea @error('description') pageOrderNew__form__inputError @enderror" data-name="description">
                                <textarea name="description" value="{{old('description')}}" id="order_description" cols="30" rows="5" placeholder="Tell us what you need">{{$order['description']}}</textarea>
                                <img src="images/contact/penIcon.svg" alt="" />
                            </div>

                            <div class="orderModal__buttons">
                                <button class="button button-variant1 pageContactForm__modal__btn" id="cancelModalButton_{{$order['id']}}">
                                    CANCEL
                                </button>
                                <button class="button button-variant1 pageContactForm__modal__btn" id="aceptlModalButton_{{$order['id']}}">
                                    ACEPT
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <form class=" pageOrderLast__actionsContainer__form cancelOrderForm" method="post" action="{{ route('orders.destroy') }}">
                    @csrf
                    @method('delete')
                    <input type="text" name="orderId" value="{{$order['id']}}" hidden />
                    <button class="pageOrderLast__actionsContainer__btn">
                        <img src="images/contact/cancelIcon.svg" alt="trash icon" />
                    </button>
                </form>
                @else
                <span class="pageOrderLast__orderStatus pageOrderLast__orderStatus-completed">{{Helpers::orderStatus($order['created_at'])}}</span>
                <form class="pageOrderLast__actionsContainer__form repeatOrderForm" data-orderid="{{$order['id']}}" method="post" action="{{ route('orders.post') }}">
                    @csrf
                    <input type="text" name="orderId" value="{{$order['id']}}" hidden />
                    <button class="pageOrderLast__actionsContainer__btn">
                        <img src="images/contact/repeatIcon.svg" alt="trash icon" />
                    </button>

                    <div class="pageContactForm__modalContainer pageContactForm__modalContainer-hidden" id="repeatOrderModal-{{$order['id']}}">
                        <div class="pageContactForm__modal">
                            <h2 class="pageContactForm__modal__title">
                                Repeat Order
                            </h2>

                            <div class="pageOrderNew__form__select @error('type') pageOrderNew__form__inputError @enderror" data-name="type">
                                <select name="type" id="order_type">
                                    <option value="food" {{$order['type']==='food' ? 'selected' : '' }}>Food</option>
                                    <option value="other" {{$order['type']==='other' ? 'selected' : '' }}>Other</option>
                                </select>
                                <img src="images/contact/bookIcon.svg" alt="" />
                            </div>
                            <div class="pageOrderNew__form__select @error('room_id') pageOrderNew__form__inputError @enderror" data-name="room_id">
                                <select name="room_id" id="order_room_id">
                                    <option value="" hidden>Select your room</option>
                                    @foreach ($rooms as $room)
                                    <option value="{{$room['_id']}}" {{$order['room_id'] === $room['_id'] ? 'selected' : '' }}>{{$room['roomNumber']}} - {{$room['roomType']}}</option>
                                    @endforeach
                                </select>
                                <img src="images/contact/roomIcon.svg" alt="" />
                            </div>
                            <div class="pageOrderNew__form__item-textarea @error('description') pageOrderNew__form__inputError @enderror" data-name="description">
                                <textarea name="description" value="{{old('description')}}" id="order_description" cols="30" rows="5" placeholder="Tell us what you need">{{$order['description']}}</textarea>
                                <img src="images/contact/penIcon.svg" alt="" />
                            </div>

                            <div class="orderModal__buttons">
                                <button class="button button-variant1 pageContactForm__modal__btn" id="cancelModalButton_{{$order['id']}}">
                                    CANCEL
                                </button>
                                <button class="button button-variant1 pageContactForm__modal__btn" id="aceptlModalButton_{{$order['id']}}">
                                    ACEPT
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <form class="pageOrderLast__actionsContainer__form deleteOrderForm" method="post" action="{{ route('orders.destroy') }}">
                    @csrf @method('delete')
                    <input type="text" name="orderId" value="{{$order['id']}}" hidden />
                    <button class="pageOrderLast__actionsContainer__btn">
                        <img src="images/contact/trashIcon.svg" alt="trash icon" />
                    </button>
                </form>
                @endif
            </div>
            <h4 class="pageOrderLast__type">{{$order['type']}}</h4>
            <p class="pageOrderLast__description">{{$order['description']}}</p>
            <p class="pageOrderLast__timestamp">{{$order['created_at']}}</p>
        </div>
        @endforeach
    </div>
    <div class="pageContactForm__modalContainer pageContactForm__modalContainer-hidden" id="deleteOrdersModal">
        <div class="pageContactForm__modal">
            <h2 class="pageContactForm__modal__title">
                Do you really want to delete this order?
            </h2>
            <div class="orderModal__buttons">
                <button class="button button-variant1 pageContactForm__modal__btn" id="cancelDeleteOrder">
                    CANCEL
                </button>
                <button class="button button-variant1 pageContactForm__modal__btn" id="deleteOrderModalBtn">
                    ACEPT
                </button>
            </div>
        </div>
    </div>
    @endif
</section>
@endsection
@section('extraScript')
<script src="JS/order.js"></script>
@endsection