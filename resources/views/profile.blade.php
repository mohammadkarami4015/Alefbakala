@extends('main')
@section('title')
  پروفایل
@stop
@section('content')

    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
            <h1 class="title">پروفایل</h1>
            <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td class="text-center">شماره</td>
                            <td class="text-left">وضعیت سفارش</td>
                            <td class="text-left">تاریخ ارسال</td>
                            <td class="text-left">زمان ارسال</td>
                            <td class="text-left">قیمت پرداختی</td>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td class="text-right">{{$order->id}}</td>
                                    <td class="text-left">{{\App\Models\Order::orderStatus($order->order_status)}}</td>
                                    <td class="text-right">{{$order->send_date}}</td>
                                    <td class="text-right">{{$order->send_time}}</td>
                                    <td class="text-right">{{$order->payed_price}}تومان</td>


                                </tr>

                                <!--                        --><?php
                                //                        $key = $count[$key];
                                //                        ?>
                            @endforeach


                        </tbody>
                    </table>


            </div>
        </div>
        <!--Middle Part End -->
    </div>

@stop

