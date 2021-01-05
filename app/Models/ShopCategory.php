<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class ShopCategory extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $guarded = [];


    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function createNew(Request $request)
    {
        $shop = auth()->user();

        /**@var $shop Shop * */
        return $shop->shopCategories()->create([
            'title' => $request->get('title'),
            'status' => 'on',
        ]);
    }

    public static function scopeSearch(Builder $query, $shopId, $data)
    {
        $query->where('shop_id', $shopId)->where(function (Builder $query) use ($data) {
            $query->Where('title', 'like', '%' . $data . '%')
                ->orWhere('type', 'like', '%' . $data . '%');

            return $query;
        });
    }


}
