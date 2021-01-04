@extends('main')
@section('title')
    سبد خرید
@stop
@section('navbar')
    @include('navbar')
@stop
@section('content')

    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
            <h1 class="title">سبد خرید</h1>
            <div class="table-responsive">
                <form action="{{route('cart.checkout')}}" method="post">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td class="text-center">تصویر</td>
                            <td class="text-left">نام محصول</td>
                            <td class="text-left">تعداد</td>
                            <td class="text-right">قیمت واحد</td>
                            <td class="text-right">قیمت با تخفیف</td>

                        </tr>
                        </thead>
                        <tbody>

                        @csrf
                        @if($products)
                            @foreach($products as $key=>$product)
                                <?php
                                if ($product->photos){
                                    $photo = explode(';', $product->photo)[0];
                                }
                                ?>

                                <tr>
                                    <td class="text-center"><a><img
                                                src="/{{$product->photos ? $photo : '' }}"
                                                alt="{{$product->title}}" title="{{$product->title}}"
                                                class="img-thumbnail"/></a>
                                    </td>
                                    <td class="text-left"><a href="#">{{$product->title}}</a><br/>
                                        <small> موجودی: {{$product->inventory}}</small>
                                    </td>
                                    <td class="text-left">
                                        <div class="input-group btn-block quantity">
                                            <input type="hidden" name="products[]" value="{{$product->id}}">
                                            <input id="count{{$count[$key]}}" type="number"
                                                   name="count[]" value="{{$count[$key]}}" max="{{$product->inventory}}"
                                                   min="0"
                                                   class="form-control"/>
                                            <span class="input-group-btn">


                                        <a href="{{route('cart.delete',$product->id)}}" type="button"
                                           data-toggle="tooltip" title="حذف" class="btn btn-danger"><i
                                                class="fa fa-times-circle"></i></a>
                                </span>
                                        </div>
                                    </td>

                                    <td class="text-right">{{$price=$product->price}}تومان</td>
                                    <td class="text-right">{{$price=$product->price_with_discount}}تومان</td>


                                </tr>

                                <!--                        --><?php
                                //                        $key = $count[$key];
                                //                        ?>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                    @if($products)
                        <button style="border-radius: 5px" class="pull-right btn btn-primary">ادامه خرید</button>

                    @endif
                </form>
            </div>
        </div>
        <!--Middle Part End -->
    </div>

@stop

