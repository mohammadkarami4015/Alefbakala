<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Http\Requests\CartCheckoutRequest;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add(CartAddRequest $request)
    {
        $product = Product::query()->find($request->get('product_id'));

        if (Session::get('order.shop_id.0') != null && Session::get('order.shop_id.0') != $product->shop_id)
            return back()->withErrors('شما نمیتوانید از چند فروشگاه خرید کنید');

        Session::push('order.product', $product);

        Session::push('order.shop_id', $product->shop_id);

        Session::push('order.count', $request->get('count'));

        session()->flash('flash_message', 'محصول مورد نظر به سبد خرید شما افزوده شد.با مرجعه به بخش سبد خرید میتوانید سفارشات خود را کامل کنید');

        return back();


    }

    public function show()
    {
        $orders['product'] = Session::get('order.product');
        $orders['count'] = Session::get('order.count');

        return view('cart.show', [
            'products' => $orders['product'],
            'count' => $orders['count'],
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

        session()->flash('flash_message', 'محصول مورد نظر از سبد خرید شما حذف شد');

        return back()->with([
            'products' => Session::get('order.product'),
            'count' => Session::get('order.count'),
        ]);

    }

    public function checkout(CartCheckoutRequest $request)
    {
        $orders = collect();
        $totalPrice = 0;
        $totalDiscountPrice = 0;
        if ($request->get('products')) {
            foreach ($request->get('products') as $key => $id) {
                $orders->push([
                    'product' => $product = Product::query()->find($id),
                    'shop_id' => $product->shop_id,
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
        } else {
            return back()->withErrors('سبد خرید شما خالی است');
        }

    }

    public function order(OrderRequest $request)
    {
        $temp = [];
        $temp1 = [];

        for ($i = 0; $i < count($request->get('products')); $i++) {
            array_push($temp, [$request->get('products')[$i], $request->get('counts')[$i]]);
            array_push($temp1, implode(',', $temp[$i]));
        }

        $products = implode(';', $temp1);


        $order = Order::query()->create([
            'total_price' => $request->get('total_discount_price'),
            'send_price' => $request->get('send_price'),
            'payed_price' => $request->get('total_discount_price') + $request->get('send_price'),
            'products' => $products,
            'order_status' => '1',
            'shop_id' => $request->get('shop_id')[0],
            'address' => $request->get('address'),
            'payment_flag' => 'waiting',
            'desc' => $request->get('desc'),
            'send_date' => $request->get('send_date'),
            'send_time' => $request->get('send_time'),
            'facture_flag' => $request->get('facture_flag') ? true : false,
            'payment_type' => $request->get('payment_type'),
            'user_id' => auth()->id(),
        ]);

        if ($order) {
            Session::forget('order');
            Session::save();
            session()->flash('flash_message', 'سفارش شما با موفقیت ثبت شد');

            return redirect(route('cart.show'));
        } else
            return back()->withErrors('خطا در ثبت سفارش');
    }
}
