@extends('layouts.layoutSite.SitePage')
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
                                    <li class="breadcrumb-item active" aria-current="page">{{__('Sign In')}}</li>
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
        <p class="h4 text-center">{{__('Sign In')}}</p>
        <div class="col-md-4  m-auto my-5">
        <form method="POST" action="{{route('login')}}" class="ltn__form-box contact-form-box">
                            @csrf

            <div class="mb-3">
                <label for="user-name-or-email" class="form-label"> {{__('Email')}}</label>
                
                @error('email')
                            <small class="form-text text-danger">{{__('The password or email does not match our records.')}} </small>
                            @enderror
                <input type="text" name="email" value="{{old('email')}}" class="form-control" id="user-name-or-email" >
              </div>
         
          <div class="mb-3">
            <label for="user-password" class="form-label">{{__('Password')}}</label>
            <div class="input-group">
                 @error('password')
                            <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                <input type="password" name="password" class="form-control" aria-label="user-password" aria-describedby="user-password">
            </div><br>
            <div class="text-center">
            <input type="submit"  class="btn btn-primary border-0 rounded-0 w-100" value="  {{__('Sign In')}} " style="background-color: var(--main-color);">
        </div>
             <div class="text-center"><p class="h6 pb-10 my-4"> {{__('or')}} </p></div>
            <div class="text-center">
            <a href="{{route('register')}}" class="h5 text-dark"> {{__('Register')}}</a>
             
                </div>
            
          </div>
</form>
        </div>
    </div>
</section>

@stop

 

