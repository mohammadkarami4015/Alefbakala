@extends('main')
@section('title')
    alefbakala
@stop
@section('content')

    <div class="row">
        <div class="col-sm-6" style="margin-right: 25%">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"> فرم ورود</h4>
                </div>
                <div id="getCode">

                </div>
                <div id="collapse-coupon" class="panel-collapse collapse in">
                    <div class="panel-body" style="margin-right: 20%;">
                        <div class="card-body">
                            <form method="post" action="{{ route('login') }}">
                                @csrf


                                <div class="form-group row">

                                    <div class="col-md-8">
                                        <input id="phone_number" type="text" maxlength="11" minlength="11"
                                               placeholder="شماره تلفن خود را وارد کنید"
                                               class="form-control @error('phone_number') is-invalid @enderror"
                                               name="phone_number" required autocomplete="current-password">

                                        @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror

                                    </div>
                                </div>

                                <br>

                                <div class="form-group row">
                                    <div class="col-md-8">
                                        <input placeholder="کد دریافت شده را وارد کنید" id="code" type="password"
                                               class="form-control @error('code') is-invalid @enderror" name="code"
                                               required
                                               autocomplete="current-password">
                                        @error('code')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-6" style="">
                                    <div class="form-group row" style="float: right;">
                                        <div>
                                            <a onclick="sendCode()" class="btn btn-sm btn-primary"
                                               style="border-radius: 3px">
                                                دریافت کد عضوبت
                                            </a>
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                    style="border-radius: 3px">
                                                ورود به الفبا کالا
                                            </button>
                                        </div>
                                        <br>
                                        <div>

                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>


                    </div>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <script type="text/javascript" src="{!! asset('js/sweetalert.min.js') !!}"></script>
                    @include('flash')
                    <script>
                        function sendCode() {
                            var value = $('#phone_number').val();
                            if (value.length != 11) {
                                alert('شماره تلفن را درست وارد کنید')
                            } else {
                                $.get(`/auth/send-number`, {phone_number: value}, function (result) {
                                    $('#getCode').html(result)
                                });
                            }
                        }

                    </script>
@stop





{{--@endsection--}}
