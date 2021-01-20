@extends('main')
@section('title')
    alefbakala
@stop
@section('navbar')
    @include('navbar')
@stop
@section('content')
    <div id="container">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>

            </ul>
            <!-- Breadcrumb End-->
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-9">
                    <h1 class="title">تماس با ما</h1>
                    <h3 class="subtitle">محل ما</h3>
                    <div class="row">
                        <div class="col-sm-3"><img src="image/product/store_location-275x180.jpg" alt="قالب مارکت شاپ" title="قالب مارکت شاپ" class="img-thumbnail"></div>
                        <div class="col-sm-3"><strong>آدرس شرکت</strong><br>
                            <address>
                                 شهران،<br>
                                   بالاتر از فلکه دوم،<br>
                                شاختمان محمد،<br>
                                 </address>
                        </div>
                        <div class="col-sm-3"><strong>شماره تماس</strong><br>
                            09366798946 <br>
                            <br>
                            <strong>تلفن دفتر</strong><br>
                            021 44307789 </div>
                        <div class="col-sm-3"> <strong>تحویل کالا</strong><br>
                            شنبه تا جمعه از ساعت 7 تا 22<br>
                            <br>
                            <strong>پشتیبانی تلفنی</strong><br>
                            هرگونه سوالی در خصوص انتخاب محصول و ثبت سفارش  </div>

                        <strong>تماس با پشتیبانی</strong><br>
                            02144307789  </div>
                    </div>
                </div>
                <!--Middle Part End -->
            </div>
        </div>
    </div>
@stop
@section('footer')
    @include('footer')
@stop
