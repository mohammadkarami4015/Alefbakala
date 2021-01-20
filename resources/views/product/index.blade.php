@extends('main')
@section('navbar')
    @include('navbar')
@stop
@section('content')
    <div id="content" class="col-sm-12">
        <h1 class="title">محصولات</h1>

        <h4 class="title">دسته بندی ها</h4>

        <div class="category-list row">

            <div class="col-sm-2" style="border: 0.2px gray solid;margin-left: 1px;background: white">
                <ul class="list-item">
                    <li><a style="color: #985f0d" onclick="filter({{$shop->id}},0)">همه دسته ها</a></li>
                </ul>
            </div>

            @foreach($shopCategories as $shopCategory)
                <div class="col-sm-2" style="border: 0.2px gray solid;margin-left: 1px;background: white">
                    <ul class="list-item">
                        <li><a style="color: #985f0d" onclick="filter({{$shop->id}},{{$shopCategory->id}})">{{$shopCategory->title}}</a></li>
                    </ul>
                </div>
            @endforeach

        </div>

        <div class="product-filter">
            <div class="row">




            </div>
        </div>
        <br>
        <div id="result" class="row products-category">

            @foreach($products as $product)
                <?php
                if ($product->photos)
                    $photo = explode(';', $product->photos)[0];
                ?>
                <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="product-thumb" style=" margin-left: 20px;border: 1px double ; box-shadow: 2px 2px 2px 2px gray; min-height:350px ; max-height:450px;background: white">
                        <div style="min-height: 200px;max-height: 350px" class="image"><a href="{{route('product.details',[$shop,$product])}}"><img
                                    src="{{$product->photos ? $photo : ''}}" alt="{{$product->title}}"
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
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="{!! asset('js/sweetalert.min.js') !!}"></script>
    <script>
        function filter(shop,catId) {

            $.get(`/shops/products/filter`, {cat_id:catId , shop_id: shop}, function (result) {
                $('#result').html(result)
            });
        }

    </script>
@stop
