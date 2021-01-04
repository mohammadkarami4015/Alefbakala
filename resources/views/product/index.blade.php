@extends('main')
@section('navbar')
    @include('navbar')
@stop
@section('content')
    <div id="content" class="col-sm-12">
        <h1 class="title">محصولات</h1>

        <h4 class="title">دسته بندی ها</h4>
        <div class="category-list row">

            @foreach($shopCategories as $shopCategory)
                <div class="col-sm-3">
                    <ul class="list-item">
                        <li><a style="color: #985f0d" href="#">{{$shopCategory->title}}</a></li>
                    </ul>
                </div>
            @endforeach

        </div>

        <div class="product-filter">
            <div class="row">


                <div class="col-sm-2 text-right">
                    <label class="control-label" for="input-sort">مرتب سازی :</label>
                </div>
                <div class="col-md-8 text-right">
                    <select id="input-sort" class="form-control col-sm-7">
                        <option value="" selected="selected"></option>
                        <option value="">جدیدترین</option>
                        <option value="">محبوب ترین</option>
                        <option value="">پربازدید ترین</option>
                    </select>
                </div>

            </div>
        </div>
        <br>
        <div class="row products-category">

            @foreach($products as $product)
                <?php
                if ($product->photos)
                    $photo = explode(';', $product->photos)[0];
                ?>
                <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="product-thumb">
                        <div style="min-height: 200px;max-height: 350px" class="image"><a href="{{route('product.details',[$shop,$product])}}"><img
                                    src="/{{$photo}}" alt="{{$product->title}}"
                                    title="{{$product->title}}" class="img-responsive"/></a></div>
                        <div class="caption">
                            <h4><a >{{$product->title}}</a></h4>
                            <p class="price"><span class="price-new">{{$product->price_with_discount}} تومان</span> <span
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
                            <a class="btn-primary"  href="{{route('product.details',[$shop,$product])}}">
                                مشاهده
                            </a>

                        </div>
                    </div>
                </div>

            @endforeach


        </div>

    </div>

@stop
