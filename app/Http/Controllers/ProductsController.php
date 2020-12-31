<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use App\Models\ShopCategory;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index(Shop $shop)
    {
        $products = $shop->products()->latest()->paginate(30);
        return view('product.index', [
            'shop' => $shop,
            'products' => $products,
            'shopCategories' => $shop->shopCategories()->where('status', 'on')->get(),
        ]);
    }

    public function orderProducts(Request $request)
    {
        $products = Product::query()->whereIn('id', explode(',', $request->products))->orderByDesc("id")->get();
        $productsRe = ProductResource::collection($products);
        return prepareResult(
            "success",
            ['order_products' => $productsRe, "user" => new UserResource($request->user())],
            "order products",
            []
        );
    }

    public function detail(Shop $shop, Product $product)
    {


        return view('product.details', [
            'shop' => $shop,
            'product' => $product,
            'photos' => explode(';', $product->photo),
            'features' => explode(';', $product->features),
            'category'=>ShopCategory::query()->find($product->shop_category_id)->title
        ]);
    }

    public function customSearch(Request $request)
    {
        $Query = Product::query();
        if ($request->shop_id && $request->shop_id != null) {
            $Query->where('shop_id', $request->shop_id);
        }
        if ($request->shop_category_id && $request->shop_category_id != null) {
            $Query->where('shop_category_id', $request->shop_category_id);
        }
        if ($request->special && $request->special != null) {
            $Query->where('special', $request->special);
        }
        if ($request->group_id && $request->group_id != null) {
            $Query->where('group_id', $request->group_id);
        }
        if ($request->installment_flag && $request->installment_flag != null) {
            $Query->where('installment_flag', $request->installment_flag);
        }
        if ($request->subgroup_id && $request->subgroup_id != null) {
            $Query->where('subgroup_id', $request->subgroup_id);
        }
        if ($request->city_id && $request->city_id != null) {
            $Query->where('city_id', $request->city_id);
        }
        if ($request->title && $request->title != null) {
            $Query->where('title', 'LIKE', '%' . $request->title . "%");
        }
        if ($request->min_price && $request->min_price != null) {
            $Query->where('price_with_discount', '>=', (int)$request->min_price);
        }
        if ($request->max_price && $request->max_price != null) {
            $Query->where('price_with_discount', '<=', (int)$request->max_price);
        }
        if ($request->orderBy && $request->orderBy != null) {
            $Query->orderBy($request->orderBy, $request->orderByType);
        }

        $products = $Query->where('admin_verification', 'on')
            ->where('status', 'on')
            ->get();
        $productsRe = paginateItems($request, ProductResource::collection($products));
        return prepareResult(
            "success",
            [$productsRe],
            "Custom search result",
            []
        );
    }

}
