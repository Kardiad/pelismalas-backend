<?php

namespace App\BussinesLogic\ValueObject;

use Illuminate\Http\Exceptions\HttpResponseException;

class ValueEmail{
    private static string $email;

    public static function generate(string $email){
        self::$email = trim($email);
        if (!filter_var(self::$email, FILTER_VALIDATE_EMAIL)) {
            throw new HttpResponseException(response()->json([
                'status' => 400,
                'msg' => 'Invalid email format.'
            ], 400));
        }
        return self::$email;
    }
}