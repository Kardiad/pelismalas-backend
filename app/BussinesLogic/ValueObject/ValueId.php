<?php

namespace App\BussinesLogic\ValueObject;

use Illuminate\Http\Exceptions\HttpResponseException;

class ValueId{
    private static int $id;
    public static function generate(int $id){
        self::$id = $id;
        if(gettype($id) !== 'integer' || $id < 0){
            throw new HttpResponseException(response()->json([
                'status' => 400,
                'msg' => 'Invalid ID value.'
            ], 400));
        }
        return self::$id;
    }
}