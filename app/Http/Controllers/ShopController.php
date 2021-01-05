<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Shop;
use Illuminate\Http\Request;


class ShopController extends Controller
{

    public function showAll()
    {
        $shops = Shop::query()->where('admin_verification', 'on')
            ->where('status', 'on')
            ->latest()->get();

        $groups = Group::query()->orderBy('title', 'asc')->get();

        return view('shop.index', ['shops' => $shops, 'groups' => $groups]);
    }

    public function details(Shop $shop)
    {
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

    public function filterByGroup(Request $request)
    {
        $id = $request->get('id');

        if ($id == 0)
            $shops = Shop::query()->where('admin_verification', 'on')
                ->where('status', 'on')
                ->latest()->get();
        else
            $shops = Shop::query()->where('admin_verification', 'on')
                ->where('status', 'on')->where('group_id', $id)
                ->latest()->get();

        $groups = Group::query()->orderBy('title', 'asc')->get();

        return view('shop.filter', compact('shops', 'groups'));
    }

    public function filter(Request $request)
    {
        $id = $request->get('id');
        if ($id == 1)
            $shops = Shop::query()->where('admin_verification', 'on')->where('status', 'on')
                ->orderBy('id', 'desc')
                ->get();
        elseif ($id == 2)
            $shops = Shop::query()->where('admin_verification', 'on')->where('status', 'on')
                ->orderBy('rate', 'desc')
                ->get();
        elseif ($id == 3)
            $shops = Shop::query()->where('admin_verification', 'on')->where('status', 'on')
                ->orderBy('count_view', 'desc')
                ->get();
        else
            $shops = Shop::query()->where('admin_verification', 'on')
                ->where('status', 'on')
                ->latest()->get();


        return view('shop.filter', ['shops' => $shops]);
    }


}
