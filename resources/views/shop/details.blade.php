@extends('main')
@section('title')
@stop
@section('navbar')
    @include('navbar')
@stop
@section('content')
    <div id="container" style="margin-right: 10%">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li itemscope><a href="{{route('home')}}"
                                 itemprop="url"><span itemprop="title"><i
                                class="fa fa-home"></i></span></a></li>
                <li itemscope><a href="{{route('shop.all')}}"
                                 itemprop="url"><span itemprop="title">بازار</span></a>
                </li>
            </ul>


            <!-- Breadcrumb End-->
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-9">
                    <div itemscope >
                        <h1 class="title" itemprop="name">{{$shop->title}}</h1>
                        <div class="row product-info">
                            <div class="col-sm-11">
                                <div class="image">

                                    <!-- Slideshow Start-->

                                    <div class="slideshow single-slider owl-carousel ">
                                        @foreach($photos as $photo)

                                            <div class="item" style="max-height:400px; "><a href=""><img class="img-responsive"
                                                                              src="{{$photo}}"

                                                                              alt="{{$shop->title}}"/></a></div>
                                        @endforeach
                                    </div>
                                    <!-- Slideshow end-->
                                </div>
                            </div>
                            <div class="col-sm-11">
                                <ul class="list-unstyled description">
                                    <li style="font-size: 16px"><b>عنوان :</b> <span
                                            itemprop="brand"></span>{{$shop->title}}</li>
                                    <br>
                                    <li style="font-size: 16px"><b> تلگرام :</b> <span
                                            itemprop="mpn">{{$shop->telegram}}</span></li>
                                    <br>
                                    <li style="font-size: 16px"><b> واتس آپ :</b> <span
                                            itemprop="mpn">{{$shop->whatsup}}</span></li>
                                    <br>
                                    <li style="font-size: 16px"><b> اینستاگرام :</b> <span
                                            itemprop="mpn">{{$shop->instagram}}</span></li>
                                    <br>
                                    <li style="font-size: 16px"><b> آدرس :</b> <span
                                            itemprop="mpn">{{$shop->address}}</span></li>
                                    <br>
                                    @if($shop->working_hours)
                                        <?php
                                        $workTime = explode(';', $shop->working_hours);
                                        if (is_array($workTime) && count($workTime) > 1) {
                                            $workday = explode(',', $workTime[0]);
                                            $workinghour = explode(',', $workTime[1]);
                                        }
                                        ?>
                                        @if(is_array($workTime) && count($workTime) > 1 )
                                            <li style="font-size: 16px"><b>ساعت کاری:</b>
                                                از <b>{{$workday[0]}}</b> ساعت <b>{{$workinghour[0]}}</b>

                                                تا <b> {{$workday[1]}} </b>
                                                ساعت <b>{{$workinghour[1]}}</b>

                                            </li>
                                        @endif
                                    @endif
                                    <br>
                                    <li style="font-size: 16px"><b>وضعیت :</b> <span
                                            class="instock">{{$shop->status == 'on' ? 'باز است' : 'بسته است'}}</span>
                                    </li>
                                    <br>
                                    <li style="font-size: 16px"><b>شماره تماس :</b> <a href="#"><span
                                                itemprop="brand">{{$shop->contact_phone}}</span></a></li>
                                    <br>

                                </ul>
                                <ul class="price-box">
                                    <li class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                        <span class="">حداقل سفارش</span> <span
                                            itemprop="old-price">{{$shop->min_order_price}} تومان</span>
                                    <li></li>
                                    <li class="price"> هزینه ارسال: {{$shop->send_prices   }}تومان</li>
                                </ul>


                                <hr>
                                <!-- AddThis Button BEGIN -->

                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab-description" data-toggle="tab">توضیحات</a></li>
                                <li><a href="#tab-specification" data-toggle="tab">مشخصات</a></li>
                            </ul>
                            <div class="tab-content">
                                <div itemprop="description" id="tab-description" class="tab-pane active">
                                    <div>
                                        {{$shop->desc}}
                                    </div>
                                </div>
                                <div id="tab-specification" class="tab-pane">
                                    <div id="tab-specification" class="tab-pane">
                                    </div>
                                </div>

                            </div>
                            <br>
                            <h2 class="subtitle">دسته بندی ها <a class="viewall"></a>
                            </h2>
                            <div class="owl-carousel latest_category_carousel">
                                @foreach($shopCategories as $shopCategory)
                                    <div class="product-thumb " style="border: 0.2px gray solid;margin-left: 1px;background: white">

                                        <div class="caption">
                                            <h2 style="color: #985f0d">{{$shopCategory->title}}</h2>

                                        </div>

                                    </div>

                                @endforeach

                            </div>
                            <br>

                            <h2 class="subtitle">محصولات - <a style="float: left" class="viewall" href="{{route('product.index',$shop)}}">نمایش همه</a>
                            </h2>
                            <div class="owl-carousel related_pro">

                                @foreach($products as $product)
                                    <?php

                                    if ($product->photos)
                                        $photo = explode(';', $product->photos)[0];

                                    ?>
                                    <div class="product-thumb" style="width: 160px ;margin-left: 40px;border: 1px gray double ; box-shadow: 2px 2px 2px 2px gray; min-height:350px ; max-height:450px;background: white">

                                        <div style="min-height: 200px;max-height: 350px" class="image"><a
                                                href="{{route('product.details',[$shop,$product])}}"><img
                                                    src="{{$photo}}"
                                                    alt="{{$product->title}}"
                                                    title="{{$product->title}}" class="img-responsive"/></a></div>
                                        <div class="caption">
                                            <h4>{{$product->title}}</h4>
                                            <p class="price"><span class="price-new">{{$product->price_with_discount}} تومان</span>
                                                <span
                                                    class="price-old">{{$product->price}} تومان</span>

                                            <div class="rating">
                                                <span class="fa fa-stack"><i
                                                        class="fa fa-star fa-stack-2x"></i><i
                                                        class="fa fa-star-o fa-stack-2x"></i></span> <span
                                                    class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                        class="fa fa-star-o fa-stack-2x"></i></span> <span
                                                    class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                        class="fa fa-star-o fa-stack-2x"></i></span> <span
                                                    class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                                        class="fa fa-star-o fa-stack-2x"></i></span> <span
                                                    class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                            </div>
                                        </div>
                                        <div class="button-group">
                                            <a class="btn-primary" href="{{route('product.details',[$shop,$product])}}">
                                                مشاهده
                                            </a>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--Middle Part End -->
                    <!--Right Part Start -->

                    <!--Right Part End -->
                </div>
            </div>
        </div>
        @stop

        @section('script')
            <script type="text/javascript" src="/js/jquery.elevateZoom-3.0.8.min.js"></script>
            <script type="text/javascript" src="/js/swipebox/lib/ios-orientationchange-fix.js"></script>
            <script type="text/javascript" src="/js/swipebox/src/js/jquery.swipebox.min.js"></script>

@stop

@section('footer')
    @include('footer')
@stop
