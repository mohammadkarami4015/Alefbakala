@if($products)
    @foreach($products as $key=>$product)
        <?php
        if ($product->photos){
            $photo = explode(';', $product->photo)[0];
        }
        ?>

        <tr>
            <td class="text-center"><a><img
                        src="/{{$product->photos ? $photo : '' }}"
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


                                        <a  onclick="del({{$product->id}})" type="button"
                                            data-toggle="tooltip" title="حذف" class="btn btn-danger"><i
                                                class="fa fa-times-circle"></i></a>
                                </span>
                </div>
            </td>

            <td class="text-right">{{$price=$product->price}}تومان</td>
            <td class="text-right">{{$price=$product->price_with_discount}}تومان</td>


        </tr>
    @endforeach
@endif
