@extends('layouts.admin.main')
@section('content') 
 
<div class="row g-1 g-sm-3 mb-3 row-deck">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">المستخدمين</span>
                                                        <div><span class="fs-6 fw-bold me-2">{{$users}}</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-student-alt fs-3 color-light-orange"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">اجمالي الطلبات الجديدة</span>
                                                        <div><span class="fs-6 fw-bold me-2">{{$orders}}</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-shopping-cart fs-3 color-lavender-purple"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">اجمالي الطلبات التي تم شحنها</span>
                                                        <div><span class="fs-6 fw-bold me-2">{{$orderssh}}</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-fast-delivery fs-3 color-santa-fe"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted"> طلبات اليوم</span>
                                                        <div><span class="fs-6 fw-bold me-2">{{$orderstoday}}</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-files-stack fs-3 color-danger"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">اجمالي المنتجات</span>
                                                        <div><span class="fs-6 fw-bold me-2">{{$prducts}}</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-calculator-alt-1 fs-3 color-lightblue"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="card">
                                                <div class="card-body py-xl-4 py-3 d-flex flex-wrap align-items-center justify-content-between">
                                                    <div class="left-info">
                                                        <span class="text-muted">عدد المنتجات المنتهية</span>
                                                        <div><span class="fs-6 fw-bold me-2">{{$prductsem}}</span></div>
                                                    </div>
                                                    <div class="right-icon">
                                                        <i class="icofont-box fs-3 color-light-success"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 


                                        <div class="card">
                                            <div class="card-header">
                                                تفعيل و تعطيل المنتجات
                                            </div>
                                            <div class="card-body">
                                                <form method="POST" action="{{ route('admin.updatewebsite') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <input class="form-check-input" type="checkbox" value="true" name="maintenance_mode" id="maintenance_mode" {{ $webclose->actv==1  ? 'checked' : '' }}>

                                                        <label class="form-check-label" for="maintenance_mode">
                                                            الغاء تفعيل المنتجات
                                                        </label>
                                                        <br><br>

                                                       
                                                          


                                                        <div class="form-grouppp">
                                                            <label for="date">اختار التاريخ </label>
                                                            <input type="datetime-local" id="datetime" name="data_time" class="form-control" value="{{$webclose->data_time}}" placeholder="{{$webclose->data_time}}">

                                                        </div>
                                                    
                                                        <br>
                                                        <br>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="maintenance_description">الوصف ب اللغه العربيه</label>
                                                        <textarea class="form-control" id="maintenance_description" rows="3" name="description_ar">{{$webclose->Description_ar}}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="maintenance_description">الوصف ب اللغه الانجليزيه </label>
                                                        <textarea class="form-control" id="maintenance_description" rows="3" name="description_en">{{$webclose->Description_en}}</textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                                </form>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-center">
                                                    @if($webclose->actv==1)
                                                        <div class="alert alert-danger">
                                                            المنتجات غير متوفره الان                                                      
                                                            </div>
                                                    @else
                                                        <div class="alert alert-success">
                                               المنتجات متوفره الان
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        

                                    </div> <!-- row end -->
@endsection

@push('js')
    <script src="{{ url('/') }}/cp/assets/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="{{ url('/') }}/cp/assets/pages/analytics-index.init.js"></script>
    <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    @endpush