<h3 class="subtitle">دسته بندی ها - <a class="viewall" href="category.html">نمایش همه</a></h3>
<div class="owl-carousel latest_category_carousel">
    @foreach($groups as $group)
        <div class="product-thumb " >

            <div class="caption">
                <h4><a href="product.html">{{$group->title}}</a></h4>
                <p class="price"> 42300 تومان </p>

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
                <div class="product-thumb clearfix">
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
    </div>

    <div id="tab-latest" class="tab_content">
        <div class="owl-carousel product_carousel_tab">


            @foreach($highest_rate_shops['items'] as $shop)
                <div class="product-thumb clearfix">
                    <div class="image"><a href="product.html"><img
                                src="image/product/FinePix-Long-Zoom-Camera-220x330.jpg" alt="{{$shop->title}}"
                                title="{{$shop->title}}" class="img-responsive"/></a></div>
                    <div class="caption">
                        <h4><a href="product.html">{{$shop->title}}</a></h4>
                        <p class="price"><span class="price-new">{{$shop->min_order_price}} تومان</span>
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
    </div>

    <div id="tab-bestseller" class="tab_content">
        <div class="owl-carousel product_carousel_tab">


            @foreach($most_viewed_shops['items'] as $shop)
                <div class="product-thumb clearfix">
                    <div class="image"><a href="product.html"><img
                                src="image/product/FinePix-Long-Zoom-Camera-220x330.jpg" alt="{{$shop->title}}"
                                title="{{$shop->title}}" class="img-responsive"/></a></div>
                    <div class="caption">
                        <h4><a href="product.html">{{$shop->title}}</a></h4>
                        <p class="price"><span class="price-new">{{$shop->min_order_price}} تومان</span>
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
    </div>

</div>    <!-- محصولات Tab Start -->
<!-- Banner Start -->
<!-- Banner End -->
<!-- دسته ها محصولات Slider Start-->

<!-- دسته ها محصولات Slider End-->

<!-- دسته ها محصولات Slider Start -->

