
<div id="carousel" class="owl-carousel nxt">
    @foreach($slider as $shop)
        <div class="product-thumb clearfix" >
            <div class="image"><a href="product.html"><img
                        src="image/product/FinePix-Long-Zoom-Camera-220x330.jpg" alt="{{$shop->title}}"
                        title="{{$shop->title}}" class="img-responsive"/></a></div>
            <div class="caption">
                <h4><a href="product.html">{{$shop->title}}</a></h4>
                <p class="price"><span class="price-new"> {{$shop->min_order_price}} تومان</span></p>
            </div>
            <div class="button-group">
                <button class="btn-primary" type="button" onClick="cart.add('42');"><span>افزودن به سبد</span>
                </button>
                <div class="add-to-links">
                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها"
                            onClick=""><i class="fa fa-heart"></i></button>
                    <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick="">
                        <i class="fa fa-exchange"></i></button>
                </div>
            </div>
        </div><div class="product-thumb clearfix" >
            <div class="image"><a href="product.html"><img
                        src="image/product/FinePix-Long-Zoom-Camera-220x330.jpg" alt="{{$shop->title}}"
                        title="{{$shop->title}}" class="img-responsive"/></a></div>
            <div class="caption">
                <h4><a href="product.html">{{$shop->title}}</a></h4>
                <p class="price"><span class="price-new"> {{$shop->min_order_price}} تومان</span></p>
            </div>
            <div class="button-group">
                <button class="btn-primary" type="button" onClick="cart.add('42');"><span>افزودن به سبد</span>
                </button>
                <div class="add-to-links">
                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها"
                            onClick=""><i class="fa fa-heart"></i></button>
                    <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick="">
                        <i class="fa fa-exchange"></i></button>
                </div>
            </div>
        </div><div class="product-thumb clearfix" >
            <div class="image"><a href="product.html"><img
                        src="image/product/FinePix-Long-Zoom-Camera-220x330.jpg" alt="{{$shop->title}}"
                        title="{{$shop->title}}" class="img-responsive"/></a></div>
            <div class="caption">
                <h4><a href="product.html">{{$shop->title}}</a></h4>
                <p class="price"><span class="price-new"> {{$shop->min_order_price}} تومان</span></p>
            </div>
            <div class="button-group">
                <button class="btn-primary" type="button" onClick="cart.add('42');"><span>افزودن به سبد</span>
                </button>
                <div class="add-to-links">
                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها"
                            onClick=""><i class="fa fa-heart"></i></button>
                    <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick="">
                        <i class="fa fa-exchange"></i></button>
                </div>
            </div>
        </div>
    @endforeach
</div>
