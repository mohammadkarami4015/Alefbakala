<?php

namespace App\Http\Controllers;


use App\Models\Group;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Shop;

class UserController extends Controller
{

    public function init()
    {
        $user = auth()->user();
        $settings = Setting::all();
        $groups = Group::query()->orderBy('title', 'asc')->get();
        //$countries = CountryResource::collection(Country::orderBy('title','asc')->get());
        $new_shops = Shop::query()->where('admin_verification', 'on')->where('status', 'on')->orderBy('id', 'desc')->get()->take(10);
        $highest_rate_shops = Shop::query()->where('admin_verification', 'on')->where('status', 'on')->orderBy('rate', 'desc')->get()->take(10);
        $most_viewed_shops = Shop::query()->where('admin_verification', 'on')->where('status', 'on')->orderBy('count_view', 'desc')->get()->take(10);
        $orders = Order::query()->where('user_id', $user->id)->orderByDesc('id')->get();

        return view('index', [
            'user' => $user,
            'groups' => $groups,
            //'countries'=>$countries,
            'settings' => $settings,
            'orders' => $orders,
            'slider' => $highest_rate_shops,
            'new_shops' => [
                "title" => "جدیدترین ها",
                "more" => "new_shops",
                "type" => "shops",
                "items" => $new_shops
            ],
            'highest_rate_shops' => [
                "title" => "محبوب ترین ها",
                "more" => "highest_rate_shops",
                "type" => "shops",
                "items" => $highest_rate_shops
            ],
            'most_viewed_shops' => [
                "title" => "پربازدیدترین ها",
                "more" => "most_viewed_shops",
                "type" => "shops",
                "items" => $most_viewed_shops
            ],
        ]);
    }

    public function profile()
    {
        $user = auth()->user();

        $orders = Order::query()->where('user_id', $user->id)->orderByDesc('id')->get();

        return view('profile', compact('orders'));
    }
}
