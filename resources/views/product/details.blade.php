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
                <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{route('home')}}"
                                                                                  itemprop="url"><span itemprop="title"><i
                                class="fa fa-home"></i></span></a></li>
                <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{route('shop.all')}}"
                                                                                  itemprop="url"><span itemprop="title">بازار</span></a>
                </li>
                {{--                <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="product.html" itemprop="url"><span itemprop="title">لپ تاپ ایلین ور</span></a></li>--}}

            </ul>


            <!-- Breadcrumb End-->
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-9">
                    <div itemscope itemtype="http://schema.org/محصولات">
                        <h1 class="title" itemprop="name">{{$product->title}}</h1>
                        <div class="row product-info">
                            <div class="col-sm-11">
                                <div class="image">

                                    <!-- Slideshow Start-->
                                    <div class="slideshow single-slider owl-carousel ">
                                        @foreach($photos as $photo)

                                            <div class="item" style="max-height:400px; "><a href=""><img class="img-responsive"
                                                                              src="{{$photo}}"
                                                                              alt="{{$product->title}}"/></a></div>
                                        @endforeach
                                    </div>
                                    <!-- Slideshow end-->
                                </div>
                            </div>
                            <div class="col-sm-11">
                                <ul class="list-unstyled description">
                                    <li style=""><b style="font-size: 18px">عنوان :</b> <span
                                            itemprop="brand"></span>{{$product->title}}</li>
                                    <li><b style="font-size: 18px"> کد : <span
                                            >{{$product->id}}</span></b></li>

                                    <li><b style="font-size: 18px"> موجودی :</b> <span
                                            class="instock">{{$product-> inventory}}</span></li>


                                    <li style=""><b style="font-size: 18px">قیمت :</b>
                                        <ul class="price-box">
                                            <p class="price"><span
                                                    class="price-new">{{$product->price_with_discount}} تومان</span>
                                                <span class="price-old">{{$product->price}} تومان</span>
                                        </ul>

                                    <li style="font-size: 16px"><b>دسته بندی :</b> <span
                                            class="instock">{{$category}}</span>
                                    </li>
                                </ul>
                                <br>
                                <hr>
                                <!-- AddThis Button BEGIN -->

                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab-description" data-toggle="tab">توضیحات</a></li>
                                <li><a href="#tab-specification" data-toggle="tab">مشخصات</a></li>
                                <li><a href="#tab-review" data-toggle="tab">ثبت نظر</a></li>
                                <li><a href="#tab-cart" data-toggle="tab"> ثبت سفارش</a></li>
                            </ul>
                            <div class="tab-content">
                                <div itemprop="description" id="tab-description" class="tab-pane active">
                                    <div>
                                        {{$shop->desc}}
                                    </div>
                                </div>
                                <div id="tab-specification" class="tab-pane">
                                    <div id="tab-specification" class="tab-pane">
                                        <ul>
                                            @if($features)
                                                @foreach($features as $feature)
                                                    <li><b style="font-size: 14px">{{explode(',',$feature)[0]}}</b>
                                                        <span
                                                            itemprop="brand"></span>{{optional(explode(',',$feature))[1]}}
                                                    </li>

                                                @endforeach

                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div id="tab-review" class="tab-pane">
                                    <form action="">
                                        <div>
                                        <textarea name="comment" class="form-control" placeholder="متن پیام">

                                        </textarea>
                                        </div>
                                        <br>
                                        <div>
                                            <button class="btn btn-sm btn-primary" style="border-radius: 5px"
                                                    type="submit"> ارسال نظر
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div id="tab-cart" class="tab-pane">
                                    <form action="{{route('cart.add')}}"  method="post">
                                        @csrf
                                        <div  class="form">
                                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                            <input type="hidden" name="shop_id" value="{{$product->shop_id}}">
                                            <div style="width: 60%">
                                                <input name="count" class="form-control" type="number" min="0" max="{{$product->inventory}}"
                                                       placeholder="تعداد">

                                            </div>
                                            <br>
                                            <div>
                                                <button  class="form-control btn btn-sm btn-primary " style="border-radius: 5px;width: 40%"
                                                        type="submit"> افزودن به سبد خرید
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{--                            <a href="{{route('product.addToCart')}}"  style="border-radius: 5px"  class="form-control btn btn-primary">افزودن به سبد خرید</a>--}}
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
