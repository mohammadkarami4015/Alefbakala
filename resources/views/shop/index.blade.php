@extends('main')
@section('title')
    بازار
@stop
@section('navbar')
    @include('navbar')
@stop
<style>
    .col-sm-2:hover{
        background: silver;
    }
</style>
@section('content')
    <div id="content" class="col-sm-12">
        <h1 class="title">فروشگاه ها</h1>

        <h2 class="title">دسته بندی ها</h2>
        <div class="category-list row">
           <div class="col-sm-2"  style="border: 0.2px gray solid;margin-left: 1px;background: white">
                <ul class="list-item">
                    <li>
                        <a style="color: #985f0d" onclick="filterByGroup(0)"> همه دسته ها </a>

                    </li>
                </ul>
            </div>
            @foreach($groups as $group)
                <div class="col-sm-2"  style="border: 0.2px gray solid;margin-left: 1px;background: white">
                    <ul class="list-item">
                        <li>
                            <a style="color: #985f0d" onclick="filterByGroup({{$group->id}})"> {{$group->title}} </a>
                        </li>
                    </ul>
                </div>
            @endforeach

        </div>

        <div class="product-filter">
            <div class="row">


                <div class="col-sm-1 text-right">
                    <label class="control-label" for="input-sort">مرتب سازی :</label>
                </div>
                <div class="col-md-8 text-right">
                    <select onchange="filter(this.value)" id="input-sort" class="form-control col-sm-7">
                        <option value="0" selected="selected">همه</option>
                        <option value="1">جدیدترین</option>
                        <option value="2">محبوب ترین</option>
                        <option value="3">پربازدید ترین</option>
                    </select>
                </div>

            </div>
        </div>
        <br>
        <div id="result" class="row products-category">

            @foreach($shops as $shop)
                <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <div class="product-thumb clearfix" style=" margin-left: 20px;border: 1px gray double ; box-shadow: 2px 2px 2px 2px gray; min-height:350px ; max-height:450px;background: white">
                        <div style="min-height: 200px;max-height: 350px" class="image"><a
                                href="{{route('shop.details',$shop)}}"><img
                                    src="{{$shop->logo}}" alt="{{$shop->title}}"
                                    title="{{$shop->title}}" class="img-responsive"/></a>
                        </div>
                        <div class="caption">
                            <h4>{{$shop->title}}</h4>
                            <p style="font-size: 13px;color: #761c19;">{{$shop->desc}}</p>
                        </div>
                        <div class="button-group">
                            <a href="{{route('shop.details',$shop)}}" class="btn-primary" type="button"
                               onClick="cart.add('42');"><span>مشاهده</span>
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
        function filter(id) {
            $.get(`/shops/filter`, {id: id}, function (result) {
                $('#result').html(result)
            });
        }
        function filterByGroup(id) {
            $.get(`/shops/filter-group`, {id: id}, function (result) {
                $('#result').html(result)
            });
        }
    </script>
@stop
@section('footer')
    @include('footer')
@stop
