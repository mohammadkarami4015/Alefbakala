<h3 class="subtitle">دسته بندی ها - <a class="viewall" href="">نمایش همه</a></h3>
<div class="owl-carousel latest_category_carousel" >
    @foreach($groups as $group)
        <div class="product-thumb " style="border: 1px gray solid;background: white">

            <div class="caption">
                <h4><a style="color: #a34c00" href="#">{{$group->title}}</a></h4>
            </div>

        </div>

    @endforeach

</div>


<div id="product-tab" class="product-tab">
    <ul id="tabs" class="tabs">
        <li><a href="#tab-featured">جدیدترین ها</a></li>
        <li><a href="#tab-latest">محبوب ترین</a></li>
        <li><a href="#tab-bestseller">پربازدید ترین ها</a></li>
    </ul>

    <div id="tab-featured" class="tab_content">
        <div class="owl-carousel product_carousel_tab">

            @foreach($new_shops['items'] as $shop)
                <div class="product-thumb clearfix"  style=" margin-left: 20px;border: 1px double ; box-shadow: 2px 2px 2px 2px gray; min-height:350px ; max-height:450px;background: white">
                    <div  style="min-height: 200px;max-height: 350px"  class="image">
                        <a href="{{route('shop.details',$shop)}}"><img
                                src="{{$shop->logo}}" alt="{{$shop->title}}"
                                title="{{$shop->title}}" class="img-responsive"/></a></div>
                    <div class="caption">
                        <h4> {{$shop->title}}</h4>
                        <p style="font-size: 13px;color: #761c19;" >{{$shop->desc}}</p>
                    </div>
                    <div class="button-group">
                        <a href="{{route('shop.details',$shop)}}" class="btn-primary" type="button" onClick="cart.add('42');"><span>مشاهده</span>
                        </a>

                    </div>
                </div>

            @endforeach


        </div>
    </div>

    <div id="tab-latest" class="tab_content">
        <div class="owl-carousel product_carousel_tab">


            @foreach($highest_rate_shops['items'] as $shop)
                <div class="product-thumb clearfix"  style=" margin-left: 20px;border: 1px double ; box-shadow: 2px 2px 2px 2px gray; min-height:350px ; max-height:450px;background: white">
                    <div  style="min-height: 200px;max-height: 350px"  class="image"><a href="{{route('shop.details',$shop)}}"><img
                                src="{{$shop->logo}}" alt="{{$shop->title}}"
                                title="{{$shop->title}}" class="img-responsive"/></a></div>
                    <div class="caption">
                        <h4>{{$shop->title}}</h4>
                        <p style="font-size: 13px;color: #761c19;" >{{$shop->desc}}</p>
                    </div>
                    <div class="button-group">
                        <a href="{{route('shop.details',$shop)}}" class="btn-primary" type="button" onClick="cart.add('42');"><span>مشاهده</span>
                        </a>

                    </div>
                </div>
            @endforeach


        </div>
    </div>

    <div id="tab-bestseller" class="tab_content">
        <div class="owl-carousel product_carousel_tab">


            @foreach($most_viewed_shops['items'] as $shop)
                <div class="product-thumb clearfix" style=" margin-left: 20px;border: 1px double ; box-shadow: 2px 2px 2px 2px gray; min-height:350px ; max-height:450px;background: white">
                    <div  style="min-height: 200px;max-height: 350px"  class="image"><a href="{{route('shop.details',$shop)}}"><img
                                src="{{$shop->logo}}" alt="{{$shop->title}}"
                                title="{{$shop->title}}" class="img-responsive"/></a></div>
                    <div class="caption">
                        <h4>{{$shop->title}}</h4>
                        <p style="font-size: 13px;color: #761c19;" >{{$shop->desc}}</p>
                    </div>
                    <div class="button-group">
                        <a href="{{route('shop.details',$shop)}}" class="btn-primary" type="button" onClick="cart.add('42');"><span>مشاهده</span>
                        </a>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>

<h3 class="subtitle"> جدید ترین ها - <a class="viewall" href=""> نمایش همه </a></h3>
<div class="owl-carousel latest_category_carousel">
    @foreach($new_shops['items'] as $shop)
        <div class="product-thumb clearfix" style=" margin-left: 20px;border: 1px double ; box-shadow: 2px 2px 2px 2px gray; min-height:350px ; max-height:450px;background: white">

            <div  style="min-height: 200px;max-height: 350px"  class="image"><a href="{{route('shop.details',$shop)}}"><img
                        src="{{$shop->logo}}" alt="{{$shop->title}}"
                        title="{{$shop->title}}" class="img-responsive"/></a></div>
            <div class="caption">
                <h4>{{$shop->title}}</h4>
                <p style="font-size: 13px;color: #761c19;" >{{$shop->desc}}</p>
            </div>
            <div class="button-group">
                <a href="{{route('shop.details',$shop)}}" class="btn-primary" type="button" onClick="cart.add('42');"><span>مشاهده</span>
                </a>

            </div>
        </div>
    @endforeach
</div>



<h3 class="subtitle"> محبوب ترین ها - <a class="viewall" href=""> نمایش همه </a></h3>
<div class="owl-carousel latest_category_carousel">
    @foreach($highest_rate_shops['items'] as $shop)
        <div class="product-thumb clearfix"  style=" margin-left: 20px;border: 1px double ; box-shadow: 2px 2px 2px 2px gray; min-height:350px ; max-height:450px;background: white">
            <div  style="min-height: 200px;max-height: 350px"  class="image"><a href="{{route('shop.details',$shop)}}"><img
                        src="{{$shop->logo}}" alt="{{$shop->title}}"
                        title="{{$shop->title}}" class="img-responsive"/></a></div>
            <div class="caption">
                <h4>{{$shop->title}}</h4>
                <p style="font-size: 13px;color: #761c19;" >{{$shop->desc}}</p>
            </div>
            <div class="button-group">
                <a href="{{route('shop.details',$shop)}}" class="btn-primary" type="button" onClick="cart.add('42');"><span>مشاهده</span>
                </a>

            </div>
        </div>
    @endforeach

</div>

<h3 class="subtitle"> پربازدید ترین - <a class="viewall" href=""> نمایش همه </a></h3>
<div class="owl-carousel latest_category_carousel"  >
    @foreach($most_viewed_shops['items'] as $shop)
        <div class="product-thumb clearfix" style=" margin-left: 20px;border: 1px double ; box-shadow: 2px 2px 2px 2px gray; min-height:350px; max-height:450px;background: white">
            <div  style="min-height: 200px;max-height: 350px"  class="image"><a href="{{route('shop.details',$shop)}}"><img
                        src="{{$shop->logo}}" alt="{{$shop->title}}"
                        title="{{$shop->title}}" class="img-responsive"/></a></div>
            <div class="caption">
                <h4>{{$shop->title}}</h4>
                <p style="font-size: 13px;color: #761c19;" >{{$shop->desc}}</p>
            </div>
            <div class="button-group">
                <a href="{{route('shop.details',$shop)}}" class="btn-primary" type="button" onClick="cart.add('42');"><span>مشاهده</span>
                </a>

            </div>
        </div>
    @endforeach
</div>






