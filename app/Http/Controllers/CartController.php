<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\DeclareDeclare;

class CartController extends Controller
{
    public function add(CartAddRequest $request)
    {
        if (!Session::has('order'))
            Session::put('order', []);

        Session::push('order.product', Product::query()->find($request->get('product_id')));

        Session::push('order.count', $request->get('count'));

        return back()->withErrors('محصول مورد نظر به سبد خرید شما افزوده شد.با مرجعه به بخش سبد خرید میتوانید سفارشات خود را کامل کنید');

    }

    public function show()
    {
        $orders['product'] = Session::get('order.product');
        $orders['count'] = Session::get('order.count');

        return view('cart.show', [
            'products' => $orders['product'],
            'count' => $orders['count']
        ]);
    }

    public function delete($id)
    {
        $orders['product'] = Session::get('order.product');
        $orders['count'] = Session::get('order.count');

        if (Session::get('order.product'))
            foreach ($orders['product'] as $key => $product) {
                if ($product->id == $id) {
                    unset($orders['product'][$key]);
                    unset($orders['count'][$key]);
                }
            }

        Session::forget('order');
        Session::save();
        Session::put('order', $orders);

        return back()->with([
            'products' => Session::get('order.product'),
            'count' => Session::get('order.count'),
        ]);

    }

    public function checkout(Request $request)
    {
        $orders = collect();
        $totalPrice = 0;
        $totalDiscountPrice = 0;

        foreach ($request->get('products') as $key => $id) {
            $orders->push([
                'product' => Product::query()->find($id),
                'count' => $request->get('count')[$key],
                'total_price' => Product::query()->find($id)->price * $request->get('count')[$key],
                'total_price_with_discount' => Product::query()->find($id)->price_with_discount * $request->get('count')[$key],
            ]);
        }

        foreach ($orders as $key => $order) {

            $totalPrice += $order['total_price'];
            $totalDiscountPrice += $order['total_price_with_discount'];
        }


        return view('cart.checkout', [
            'orders' => $orders,
            'total_price' => $totalPrice,
            'total_discount_price' => $totalDiscountPrice,
            'price_difference' => $totalPrice - $totalDiscountPrice
        ]);
    }

    public function order(Request $request)
    {
        $mergedArray = array_combine($request->get('products'),$request->get('counts'));
        foreach ($mergedArray as $key=>$value){
            $array =implode(',',$key);
        }
        $array = [];
        foreach ($request->get('products') as $key => $id) {
            $array = implode(',', $id);
        }

    }
}
