@extends('main')
@section('title')
    بازار
@stop
@section('navbar')
    @include('navbar')
@stop
@section('content')
    <div id="content" class="col-sm-12">
        <h1 class="title">فروشگاه ها</h1>

        <h2 class="title">دسته بندی ها</h2>
        <div class="category-list row">

            @foreach($groups as $group)
                <div class="col-sm-3">
                    <ul class="list-item">
                        <li ><a style="color: #985f0d" href="#">{{$group->title}}</a></li>
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

            @foreach($shops as $shop)
                <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="product-thumb clearfix">
                        <div style="min-height: 200px;max-height: 350px" class="image"><a href="{{route('shop.details',$shop)}}"><img
                                    src="/image/product/FinePix-Long-Zoom-Camera-220x330.jpg" alt="{{$shop->title}}"
                                    title="{{$shop->title}}" class="img-responsive"/></a>
                        </div>
                        <div class="caption">
                            <h4>{{$shop->title}}</h4>
                            <p style="font-size: 13px;color: #761c19;" >{{$shop->desc}}</p>
                        </div>
                        <div class="button-group">
                            <a href="{{route('shop.details',$shop)}}" class="btn-primary" type="button" onClick="cart.add('42');"><span>مشاهده</span>
                            </a>

                        </div>
                    </div>
                </div>

            @endforeach


        </div>

        {{$shops->appends(Request::all())->links()}}
    </div>

@stop
