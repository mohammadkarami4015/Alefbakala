@extends('main')
@section('title')
    سبد خرید
@stop
@section('content')

    <div class="row">
        <!--Middle Part Start-->
        <form action="{{route('cart.order')}}" method="post">
            @csrf
            <div id="content" class="col-sm-12">
                <h1 class="title">ادامه خرید</h1>
                <div class="table-responsive">

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td class="text-center">تصویر</td>
                            <td class="text-left">نام محصول</td>
                            <td class="text-left">نام فروشگاه</td>
                            <td class="text-left">تعداد</td>
                            <td class="text-right">قیمت واحد</td>
                            <td class="text-right">قیمت کل</td>
                            <td class="text-right">قیمت کل با تخفیف</td>

                        </tr>
                        </thead>
                        <tbody>

                        @if($orders)
                            @foreach($orders as $key=>$order)

                                <tr>
                                    <td class="text-center"><a><img
                                                src="/image/product/samsung_tab_1-50x75.jpg"
                                                alt="{{$order['product']->title}}" title="{{$order['product']->title}}"
                                                class="img-thumbnail"/></a>
                                    </td>
                                    <input type="hidden" name="products[]" value="{{$order['product']->id}}">
                                    <input type="hidden" name="counts[]" value="{{$order['count']}}">
                                    <input type="hidden" name="shop_id[]" value="{{$order['shop_id']}}">

                                    <td class="text-left"><a href="#">{{$order['product']->title}}</a><br/>
                                        <small> موجودی: {{$order['product']->inventory}}</small>
                                    </td>
                                    <td class="text-left">
                                        <div class="input-group btn-block quantity">
                                            {{$order['count']}}
                                        </div>
                                    </td>
                                    <td class="text-right">{{\App\Models\Shop::query()->find($order['shop_id'])->title}}</td>
                                    <td class="text-right">{{$order['product']->price}}تومان</td>
                                    <td class="text-right">{{$order['total_price']}}تومان</td>
                                    <td class="text-right">{{$order['total_price_with_discount']}}تومان</td>

                                </tr>

                                <!--                        --><?php
                                //                        $key = $count[$key];
                                //                        ?>
                            @endforeach
                        @endif

                        </tbody>
                    </table>


                </div>


                <p>در صورتی که کد تخفیف در اختیار دارید میتوانید از آن در اینجا استفاده کنید.</p>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">استفاده از کوپن تخفیف</h4>
                            </div>
                            <div id="collapse-coupon" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <label class="col-sm-4 control-label" for="input-coupon">کد تخفیف خود را در اینجا
                                        وارد
                                        کنید</label>
                                    <div class="input-group">
                                        <input type="text" name="coupon" value=""
                                               placeholder="کد تخفیف خود را در اینجا وارد کنید" id="input-coupon"
                                               class="form-control"/>
                                        <span class="input-group-btn">
                                  <input type="button" value="اعمال کوپن" id="button-coupon"
                                         data-loading-text="بارگذاری ..."
                                         class="btn btn-primary"/>
                                  </span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">آدرس</h4>
                            </div>
                            <div id="collapse-coupon" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <label class="col-sm-4 control-label" for="input-coupon">آدرس خود را وارد کنید
                                    </label>
                                    <div class="input-group col-sm-8">
                                        <input required type="text" name="address" value=""
                                               placeholder="آدرس" id="input-coupon"
                                               class="form-control"/>
                                        <span class="input-group-btn">

                                  </span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">هزینه ارسال</h4>
                            </div>
                            <div id="collapse-coupon" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <label class="col-sm-4 control-label" for="input-coupon">هزینه ارسال را وارد کنید
                                    </label>
                                    <div class="input-group col-sm-8">
                                        <input required type="text" name="send_price" value=""
                                               placeholder="هزینه ارسال" id="input-coupon"
                                               class="form-control"/>
                                        <span class="input-group-btn">

                                  </span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">توضیحات</h4>
                            </div>
                            <div id="collapse-coupon" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <label class="col-sm-4 control-label" for="input-coupon">توضیحات خود را وارد کنید
                                    </label>
                                    <div class="input-group col-sm-8">
                                        <input type="text" name="desc" value=""
                                               placeholder="توضیحات" id="input-coupon"
                                               class="form-control"/>
                                        <span class="input-group-btn">

                                  </span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">صدور فاکتور</h4>
                            </div>
                            <div id="collapse-coupon" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <label class="col-sm-4 control-label" for="input-coupon">ارسال فاکتور توسط فروشگاه
                                    </label>
                                    <div class="input-group col-sm-2">
                                        <input type="checkbox" name="facture_flag" value="true"
                                               placeholder="آدرس" id="input-coupon"
                                               class="form-control"/>
                                        <span class="input-group-btn">

                                  </span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">زمان ارسال</h4>
                            </div>
                            <div id="collapse-coupon" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <label class="col-sm-4 control-label" for="input-coupon">تاریخ ارسال
                                    </label>
                                    <div class="input-group col-sm-6">
                                        <input type="text" name="send_date" value=""
                                               placeholder="تاریخ" id="input-coupon"
                                               class="form-control col-sm-6"/>
                                        <span class="input-group-btn">

                                  </span></div>
                                </div>

                                <div class="panel-body">
                                    <label class="col-sm-4 control-label" for="input-coupon">زمان ارسال
                                    </label>
                                    <div class="input-group col-sm-6">صبح(از ساعت 8 تا 12)
                                        <input type="radio" name="send_time" value="صبح"/>
                                    </div>
                                    <div class="input-group col-sm-6">عصر(از ساعت 2 تا 18)
                                        <input type="radio" name="send_time" value="عصر"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-8">
                        <table class="table table-bordered">
                            <tr>
                                <td class="text-right"><strong>جمع کل:</strong></td>
                                <td class="text-right">{{$total_price}} تومان</td>
                            </tr>
                            <tr>
                                <td class="text-right"><strong>کسر هدیه:</strong></td>
                                <td class="text-right">{{$price_difference}} تومان</td>
                            </tr>

                            <tr>
                                <td class="text-right"><strong>جمع کل با تخفیف:</strong></td>
                                <td class="text-right">{{$total_discount_price}} تومان</td>
                            </tr>
                            <input type="hidden" name="total_price" value="{{$total_price}}">
                            <input type="hidden" name="total_discount_price" value="{{$total_discount_price}}">
                        </table>
                    </div>
                </div>
                <div class="buttons">
                    <div class="pull-right"><button type="submit" class="btn btn-primary">ثبت سفارش</button></div>
                    <div class="pull-left"><a href="index.html" class="btn btn-default"> برگشت</a></div>
                </div>
            </div>
            <!--Middle Part End -->
        </form>

@stop

