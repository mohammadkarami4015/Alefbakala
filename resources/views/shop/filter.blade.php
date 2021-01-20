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
