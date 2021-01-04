<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{

    protected $guarded = [];

    public static function createNew($v_code, $phone_number)
    {
        $code = new Code;
        $code->saveAs($v_code, $phone_number);
        return $code;
    }

    public function saveAs($v_code, $phone_number)
    {
        $this->code = $v_code;
        $this->phone_number = $phone_number;
        $this->status = 'Active';
        $this->save();
    }

   public static function generateRandomNumber($length = 6)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
