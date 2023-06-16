@extends('layout')
@section('title','Contact')
@section('pageHeader')
@parent
@section('pageTitle','Contact Us')
@section('pageBread','Contact')
@endsection
@section('content')
<section class="pageContactInfo">
    <div class="pageContactInfo__container">
        <div class="pageContactInfo__item info1">
            <img src="images/mappinIcon.svg" alt="" />
            <div class="pageContactInfo__item-container">
                <h4 class="pageContactInfo__item-title">Office Address</h4>
                <p class="pageContactInfo__item-text">
                    C. de la Princesa, 31, 2º<br />
                    28008 Madrid
                </p>
            </div>
        </div>
        <div class="pageContactInfo__item info2">
            <img src="images/phoneIcon.svg" alt="" />
            <div class="pageContactInfo__item-container">
                <h4 class="pageContactInfo__item-title">Phone Number</h4>
                <p class="pageContactInfo__item-text">+34 621 065 317</p>
            </div>
        </div>
        <div class="pageContactInfo__item info3">
            <img src="images/emailIcon.svg" alt="" />
            <div class="pageContactInfo__item-container">
                <h4 class="pageContactInfo__item-title">Email Address</h4>
                <p class="pageContactInfo__item-text">
                    agustin.carignano@gmail.com
                </p>
            </div>
        </div>
    </div>
    <div class="pageContactInfo__map">
        <iframe src="https://www.google.com/maps/d/embed?mid=1xH4wuA2UY12a3L--0Tp4s22bqMKm-Lg&ehbc=2E312F"></iframe>
    </div>
</section>
<section class="pageContactForm">
    <form method="post" class="pageContactForm__form" id="contactForm">
        @csrf
        <span class="pageContactForm__form__errorMsg">{{$hasError ? "Error: Check the remark field" : ""}}</span>
        <div class="pageContactForm__form__item {{$inputErrors['fullName'] ? 'pageContactForm__form__inputError' : ''}}" data-name="fullName">
            <input type="text" name="fullName" value="{{$contact['fullName']}}" id="contact_fullName" placeholder="Your full name" />
            <img src="images/contact/personIcon.svg" alt="" />
        </div>
        <div class="pageContactForm__form__item {{$inputErrors['phone'] ? 'pageContactForm__form__inputError' : ''}}" data-name="phone">
            <input type="text" name="phone" value="{{$contact['phone']}}" id="contact_phone" placeholder="Add phone number" />
            <img src="images/contact/phoneIcon.svg" alt="" />
        </div>
        <div class="pageContactForm__form__item {{$inputErrors['email'] ? 'pageContactForm__form__inputError' : ''}}" data-name="email">
            <input type="email" name="email" value="{{$contact['email']}}" id="contact_email" placeholder="Enter email address" />
            <img src="images/contact/envelopeIcon.svg" alt="" />
        </div>
        <div class="pageContactForm__form__item {{$inputErrors['subject'] ? 'pageContactForm__form__inputError' : ''}}" data-name="subject">
            <input type="text" name="subject" value="{{$contact['subject']}}" id="contact_subject" placeholder="Enter subject" />
            <img src="images/contact/bookIcon.svg" alt="" />
        </div>
        <div class="pageContactForm__form__item-textarea {{$inputErrors['message'] ? 'pageContactForm__form__inputError' : ''}}" data-name="message">
            <textarea name="message" value="{{$contact['message']}}" id="contact_message" cols="30" rows="10" placeholder="Tell us what you need"></textarea>
            <img src="images/contact/penIcon.svg" alt="" />
        </div>
        <input class="button button-variant1" type="submit" value="SEND" />
    </form>
    @if ($formSent)
    <div class="pageContactForm__modalContainer" id="contactModal">
        <div class="pageContactForm__modal">
            <h2 class="pageContactForm__modal__title">
                ¡Thank you for contact us!
            </h2>
            <p class="pageContactForm__modal__text">
                We have received it correctly. <br />
                Someone from our Team will get <br />
                back to you very soon.
            </p>
            <button class="button button-variant1 pageContactForm__modal__btn" id="contactModalBtn">
                ACEPT
            </button>
        </div>
    </div>
    @endif
</section>
@endsection
@section('extraScript')
<script src="JS/contact.js"></script>
@endsection