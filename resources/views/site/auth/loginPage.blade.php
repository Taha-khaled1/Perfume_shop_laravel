@extends('layouts.layoutSite.SitePage')
@section('title', 'تسجيل الدخول')
@section('content')


    <!-- breadcrumb area start --><br>
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('viewHomePage') }}"><i
                                            class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('Sign In') }}</li> 
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
        @php
            $dir = 'start-0';
        @endphp
    @else
        @php
            $dir = 'end-0';
        @endphp
    @endif
    <section class="container section-creat-account" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
        <div class="row">
            <p class="h4 text-center">{{ __('Sign In') }}</p>
            <div class="col-lg-4 col-md-12  m-auto my-5">
                <form method="POST" action="#" class="ltn__form-box contact-form-box p-3">
                    @csrf
                    <div class="mb-3">
                        <label for="phone" class="form-label">{{ __('Phone Number') }}</label>
                        @error('phone')
                        <small class="form-text text-danger">{{ __('The phone number is invalid.') }}</small>
                        @enderror
                        <div class="form-group position-relative">
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" id="phone"
                            placeholder="{{ __('Phone Number') }}">
                            <button class="btn btn-sqr position-absolute {{$dir}} top-0 text-light custom-button" style="background-color: var(--main-color);">{{ __('Send Code') }}</button>
                        </div>
                        <label for="phone" class="form-label">{{ __('Code') }}</label>
                        <div class="form-group position-relative">
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" id="phone"
                            placeholder="{{ __('Code') }}">
                            <button class="btn btn-sqr position-absolute {{$dir}} top-0 text-light custom-button" style="background-color: var(--main-color);">{{ __('Submit') }}</button>
                        </div>
                        
                            
                    </div>
                    {{-- <button type="submit" class="btn btn-sqr text-light w-100" style="background-color: var(--main-color);">
                        {{ __('Send Code') }}
                    </button> --}}
                    <div class="text-center">
                        {{-- <a href="{{ route('login') }}" class="h5 text-dark">{{ __('Sign In') }}</a> --}}
                        <a href="{{ route('register') }}" class="h5 text-dark">{{ __('Register') }}</a>
                    </div>
                </form>

                {{-- <form action="{{ route('login') }}">
                    <button type="submit" class="btn btn-sqr text-light w-100" style="background-color: var(--main-color);">
                        {{ __('Sign In') }}
                    </button>
                </form> --}}
            </div>

        </div>
    </section>
    

@stop
