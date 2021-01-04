@extends('main')
@section('title')
    پروفایل
@stop
@section('navbar')
    @include('navbar')
@stop
@section('content')

    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">

            <div style="float: left">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary " style="border-radius: 5px">خروج از الفبا کالا</button>
                </form>
            </div>
            <h1 class="title">پروفایل</h1>

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">سوابق خرید</h4>
                        </div>
                        <div id="collapse-coupon" class="panel-collapse collapse in">
                            <div class="panel-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <td class="text-center">شماره</td>
                                            <td class="text-center">وضعیت سفارش</td>
                                            <td class="text-center">تاریخ ارسال</td>
                                            <td class="text-center">زمان ارسال</td>
                                            <td class="text-center">قیمت پرداختی</td>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td class="text-center">{{$order->id}}</td>
                                                <td class="text-center">{{\App\Models\Order::orderStatus($order->order_status)}}</td>
                                                <td class="text-center">{{$order->send_date}}</td>
                                                <td class="text-center">{{$order->send_time}}</td>
                                                <td class="text-center">{{$order->payed_price}}تومان</td>


                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <!--Middle Part End -->
    </div>

@stop

