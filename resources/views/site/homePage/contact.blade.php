@extends('layouts.layoutSite.SitePage')
@section('title', 'تواصل معنا')
@section('content')

    <!-- BREADCRUMB AREA START -->
    <div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image " data-bg="{{ asset('SitePage/img/bg/14.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner">
                        <h1 class="page-title">تواصل معنا</h1>
                        <div class="ltn__breadcrumb-list">
                            <ul>
                                <li>
                                    <a href="{{ route('viewHomePage') }}">
                                        <span class="ltn__secondary-color">
                                            <i class="fas fa-home"></i>
                                        </span>
                                        الصفحة الرئيسية
                                    </a>
                                </li>
                                <li>تواصل معنا</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->
    <!-- CONTACT ADDRESS AREA START -->
    <section class="ltn__contact-address-area mb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3>عنوان البريد الإلكتروني</h3>
                        <p>{{ $email }}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h3>رقم الهاتف</h3>
                        <p>0501009004</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="ltn__contact-address-item ltn__contact-address-item-3 box-shadow">
                        <div class="ltn__contact-address-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h3>عنوان المكتب</h3>
                        <p>الامارات</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CONTACT ADDRESS AREA END -->
    <!-- CONTACT MESSAGE AREA START -->
    <section class="ltn__contact-message-area mb-120 mb--100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__form-box contact-form-box box-shadow white-bg">
                        <h4 class="title-2">إرسال رسالة</h4>
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ session::get('success') }}
                            </div>
                        @endif
                        @if (Session::has('error'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ session::get('error') }}
                            </div>
                        @endif
                        <form action="#" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-item">
                                        <input type="text" name="name" placeholder="الإسم الكامل"
                                            value="{{ old('name') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item">
                                        <input type="email" name="email" placeholder="البريد الإلكتروني"
                                            value="{{ old('email') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item">
                                        <input type="text" name="subject" placeholder="عنوان الرسالة"
                                            value="{{ old('subject') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-item">
                                        <input type="text" name="phone" placeholder="رقم الهاتف"
                                            value="{{ old('phone') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-item">
                                        <textarea name="message" placeholder="نص الرسالة" required>{{ old('message') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="btn-wrapper mt-0">
                                        <button type="submit" class="theme-btn-1 btn btn-block">إرسال</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
{{-- 
    </section>
    <!-- CONTACT MESSAGE AREA END -->
@endsection --}}

<!-- GOOGLE MAP AREA START -->

{{-- <div class="google-map mb-120">

    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9334.271551495209!2d-73.97198251485975!3d40.668170674982946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25b0456b5a2e7:0x68bdf865dda0b669!2sBrooklyn%20Botanic%20Garden%20Shop!5e0!3m2!1sen!2sbd!4v1590597267201!5m2!1sen!2sbd"
        width="100%" height="100%" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

</div> --}}
<!-- GOOGLE MAP AREA END -->
<br><br><br><br><br>
@stop

@section('script')

<script src="{{ asset('SitePage/js/plugins.js ') }}"></script>
<script src="{{ asset('SitePage/js/main.js') }}"></script>

@stop
