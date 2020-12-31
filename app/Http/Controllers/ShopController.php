<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Shop;

class ShopController extends Controller
{

    public function showAll()
    {
        $shops = Shop::query()->where('admin_verification', 'on')
            ->where('status', 'on')
            ->latest()->paginate(20);

        $groups = Group::query()->orderBy('title', 'asc')->get();

        return view('shop.index', ['shops' => $shops, 'groups' => $groups]);
    }

    public function details(Shop $shop)
    {
        auth()->loginUsingId(1);
        if (auth()->user()->id !== $shop->id) {
            $shop->count_view = $shop->count_view + 1;
            $shop->save();
        }

        return view('shop.details', [
            'shop' => $shop,
            'shopCategories' => $shop->shopCategories()->where('status', 'on')->get(),
            'products' => $shop->products()->latest()->get(),
            'photos' => explode(';', $shop->photos)
        ]);
    }

    public function rate(Request $request)
    {
        $shop = Shop::find($request->shop_id);
        if ($shop) {
            $shop->rate($request->rate);
            return prepareResult("success", new ShopResource($shop), "shop data", []);
        } else {
            return prepareResult("error", [], "shop not found", []);
        }
    }

}
