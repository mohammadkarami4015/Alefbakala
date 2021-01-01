@extends('main')
@section('title')
    سبد خرید
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

                        </tr>
                        </thead>
                        <tbody>

                        @csrf
                        @if($products)
                            @foreach($products as $key=>$product)

                                <tr>
                                    <td class="text-center"><a><img
                                                src="image/product/samsung_tab_1-50x75.jpg"
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

                                    <td class="text-right">{{$price=$product->price_with_discount}}تومان</td>


                                </tr>

                                <!--                        --><?php
                                //                        $key = $count[$key];
                                //                        ?>
                            @endforeach
                        @endif

                        </tbody>
                    </table>


                        <button style="border-radius: 5px" class="pull-right btn btn-primary">ادامه خرید</button>


                </form>
            </div>


            {{--            <h2 class="subtitle">حالا مایلید چه کاری انجام دهید؟</h2>--}}
            {{--            <p>در صورتی که کد تخفیف در اختیار دارید میتوانید از آن در اینجا استفاده کنید.</p>--}}
            {{--            <div class="row">--}}
            {{--                <div class="col-sm-6">--}}
            {{--                    <div class="panel panel-default">--}}
            {{--                        <div class="panel-heading">--}}
            {{--                            <h4 class="panel-title">استفاده از کوپن تخفیف</h4>--}}
            {{--                        </div>--}}
            {{--                        <div id="collapse-coupon" class="panel-collapse collapse in">--}}
            {{--                            <div class="panel-body">--}}
            {{--                                <label class="col-sm-4 control-label" for="input-coupon">کد تخفیف خود را در اینجا وارد--}}
            {{--                                    کنید</label>--}}
            {{--                                <div class="input-group">--}}
            {{--                                    <input type="text" name="coupon" value=""--}}
            {{--                                           placeholder="کد تخفیف خود را در اینجا وارد کنید" id="input-coupon"--}}
            {{--                                           class="form-control"/>--}}
            {{--                                    <span class="input-group-btn">--}}
            {{--                      <input type="button" value="اعمال کوپن" id="button-coupon" data-loading-text="بارگذاری ..."--}}
            {{--                             class="btn btn-primary"/>--}}
            {{--                      </span></div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}

            {{--            </div>--}}
            {{--            <div class="panel panel-default">--}}
            {{--                <div class="panel-heading">--}}
            {{--                    <h4 class="panel-title">آدرس</h4>--}}
            {{--                </div>--}}
            {{--                <div id="collapse-shipping" class="panel-collapse collapse in">--}}
            {{--                    <div class="panel-body">--}}
            {{--                        <p>آدرس خود را به صورت کامل وارد کنید.</p>--}}

            {{--                        <div class="form-group required">--}}
            {{--                            <label class="col-sm-2 control-label" for="input-postcode">آدرس </label>--}}
            {{--                            <div class="col-sm-10">--}}
            {{--                                <input type="text" name="address" placeholder=""--}}
            {{--                                       id="input-postcode" class="form-control"/>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}


            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div class="row">--}}
            {{--                <div class="col-sm-4 col-sm-offset-8">--}}
            {{--                    <table class="table table-bordered">--}}
            {{--                        <tr>--}}
            {{--                            <td class="text-right"><strong>جمع کل:</strong></td>--}}
            {{--                            <td class="text-right">132000 تومان</td>--}}
            {{--                        </tr>--}}
            {{--                        <tr>--}}
            {{--                            <td class="text-right"><strong>کسر هدیه:</strong></td>--}}
            {{--                            <td class="text-right">4000 تومان</td>--}}
            {{--                        </tr>--}}
            {{--                        <tr>--}}
            {{--                            <td class="text-right"><strong>مالیات:</strong></td>--}}
            {{--                            <td class="text-right">11880 تومان</td>--}}
            {{--                        </tr>--}}
            {{--                        <tr>--}}
            {{--                            <td class="text-right"><strong>کل :</strong></td>--}}
            {{--                            <td class="text-right">139880 تومان</td>--}}
            {{--                        </tr>--}}
            {{--                    </table>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--            <div class="buttons">--}}
            {{--                <div class="pull-left"><a href="index.html" class="btn btn-default">ادامه خرید</a></div>--}}
            {{--                <div class="pull-right"><a href="checkout.html" class="btn btn-primary">تسویه حساب</a></div>--}}
            {{--            </div>--}}
        </div>
        <!--Middle Part End -->
    </div>

@stop

