@foreach($products as $product)
    <?php
    if ($product->photos)
        $photo = explode(';', $product->photos)[0];
    ?>
    <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-4 col-xs-12">
        <div class="product-thumb" style=" margin-left: 20px;border: 1px double ; box-shadow: 2px 2px 2px 2px gray; min-height:350px ; max-height:450px;background: white">
            <div style="min-height: 200px;max-height: 350px" class="image"><a href="{{route('product.details',[$shop,$product])}}"><img
                        src="{{$photo}}" alt="{{$product->title}}"
                        title="{{$product->title}}" class="img-responsive"/></a></div>
            <div class="caption">
                <h4><a >{{$product->title}}</a></h4>
                <p class="price"><span class="price-new">{{$product->price_with_discount}} تومان</span> <span
                        class="price-old">{{$product->price}} تومان</span>

                <div class="rating">
                                                <span class="fa fa-stack"><i
                                                        class="fa fa-star fa-stack-2x"></i><i
                                                        class="fa fa-star-o fa-stack-2x"></i></span> <span
                        class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                            class="fa fa-star-o fa-stack-2x"></i></span> <span
                        class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                            class="fa fa-star-o fa-stack-2x"></i></span> <span
                        class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                            class="fa fa-star-o fa-stack-2x"></i></span> <span
                        class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                </div>
            </div>
            <div class="button-group">
                <a class="btn-primary"  href="{{route('product.details',[$shop,$product])}}">
                    مشاهده
                </a>

            </div>
        </div>
    </div>

@endforeach
