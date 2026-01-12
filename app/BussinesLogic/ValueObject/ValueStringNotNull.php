<?php

namespace App\BussinesLogic\ValueObject;

use Illuminate\Http\Exceptions\HttpResponseException;

class ValueStringNotNull{
    private static string $string;
    public static function generate(string $value){
        self::$string = trim($value);
        if(empty(self::$string)){
            throw new HttpResponseException(response()->json([
                'status' => 400,
                'msg' => 'String value cannot be null or empty.'
            ], 400));
        }
        return self::$string;
    }
}