<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public static function scopeSearch(Builder $query, $statusId, $shopId, $data)
    {

        $query->where('shop_id', $shopId)->where('order_status', $statusId)
            ->where(function (Builder $query) use ($data) {

                $query->WhereHas('user', function ($user) use ($data) {
                    return $user->where('name', 'like', '%' . $data . '%');
                });

                $query->orWhere('address', 'like', '%' . $data . '%');

                $query->orWhere('total_price', 'like', '%' . $data . '%');

            });

        return $query;
    }

   public static function orderStatus($id)
    {
        switch ($id) {
            case 1:
                return 'ثبت شد';
            case 2:
                return 'تایید شد';

            case 3:
                return 'ارسال شد';

            case 4:
                return 'تحویل داده شد';

            case 5:
                return 'لغو شد';
            case 6:
                return 'مرجوعی';
            case 7:
                return 'لغو توسط کاربر';
        }
    }

}
