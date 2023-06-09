@extends('layouts.layoutSite.SitePage',['cartcount'=>$cart->get()->count()]) 
@section('title','تسجيل الدخول')
@section('content')

 
<!-- breadcrumb area start --><br>
<div class="breadcrumb-area" >
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('viewHomePage')}}"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__('Create an account')}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
<br>
<section class="container section-creat-account" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
    <div class="row">
        <p class="h4 text-center"> {{__('Create an account')}}</p>
        <div class="col-lg-6 col-md-12 m-auto my-5">
        <form method="POST" action="{{ route('register') }}" class="ltn__form-box contact-form-box p-3">
                            @csrf
                <div class="mb-3">
                    <label for="user-name-or-email" class="form-label">  {{__('First name')}} </label>
                    @error('email')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                                @if (\Session::has('error'))
                                <small class="form-text text-danger">
                                    {{ \Session::get('error')}}
                                </small>
                                @endif
                    <input type="text" name="fname" class="form-control" id="user-name-or-email"  value="{{old('fname')}}" >
                    </div>

                    <div class="mb-3">
                        <label for="user-name-or-email" class="form-label">  {{__('Second name')}} </label>
                        @error('email')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                    @if (\Session::has('error'))
                                    <small class="form-text text-danger">
                                        {{ \Session::get('error')}}
                                    </small>
                                    @endif
                        <input type="text" name="lname" class="form-control" id="user-name-or-email"  value="{{old('lname')}}" >
                        </div>


                        <div class="mb-3">
                            <div class="form-label">{{__('Principality')}}</div>
                              <select class="form-control" name="city_id">
                                <option selected disabled>{{__('Choose the region')}}</option>
                                @foreach ($city as $item)
                                <option value="{{ $item->id }}">
                                  @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
                                  {{ $item->name }}
                                  @else
                                  {{ $item->name_en }}
                                  @endif
                                </option>
                                @endforeach
                              </select>
                          </div>
                          



                        
                   
                            
            <div class="mb-3">
                <label for="user-name-or-email" class="form-label">  {{__('Email')}} </label>
                @error('email')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                            @if (\Session::has('error'))
                            <small class="form-text text-danger">
                                {{ \Session::get('error')}}
                            </small>
                            @endif
                <input type="text" name="email" class="form-control" id="user-name-or-email"  value="{{old('email')}}" >
              </div>
              @if (LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
              @php
                  $dir = 'start-0';
              @endphp
          @else
              @php
                  $dir = 'end-0';
              @endphp
          @endif
          <label for="user-mobile" class="form-label"> {{__('Mobile number')}}</label> 

        <div class="mb-3 position-relative">
            @error('phone')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            <input type="text" name="phone"  class="form-control" id="user-mobile"  value="{{old('phone')}}"> 
            {{-- <button class="btn btn-sqr position-absolute {{$dir}} top-0 text-light custom-button" type="button" style="background-color: var(--main-color);">{{ __('Send') }}</button> --}}
          </div>
          {{-- <label for="user-mobile" class="form-label">{{ __('Code') }}</label>
          <div class="form-group position-relative">
            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" id="phone"
        >
            <button class="btn btn-sqr position-absolute {{$dir}} top-0 text-light custom-button" type="button" style="background-color: var(--main-color);">{{ __('Submit') }}</button>
        </div> --}}
          <div class="mb-3">
            <label for="user-password" class="form-label"> {{__('Password')}}</label>
            @error('password')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
            <div class="input-group">
            
                 <input type="password" class="form-control" name="password" aria-label="user-password" aria-describedby="user-password">
            </div><br>
            <div class="mb-3">
            <label for="user-password" class="form-label"> {{__('Confirm password')}}</label>
            <div class="input-group">
            @error('password_confirmation')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                 <input type="password" class="form-control" name="password_confirmation" aria-label="user-password" aria-describedby="user-password">
            </div></div>
             <div class="text-center">
            <input type="submit"  class="btn btn-sqr text-light w-100" value="{{__('Create an account')}} " style="background-color: var(--main-color);"></div>
          </form>
            <div class="text-center my-4"><p class="h6 pb-10 "> {{__('or')}} </p></div>            <div class="text-center">
            <a href="{{route('login')}}" class="h6 d-block"> {{__('Return to the login page')}}</a>
            <p>  {{__('By registering to create an account I accept the Terms and Conditions')}}</p>
                </div>
            
          </div>
        </div>
    </div>
</section>

@stop

 

