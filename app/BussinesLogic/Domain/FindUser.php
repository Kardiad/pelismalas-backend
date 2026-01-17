<?php

namespace App\BussinesLogic\Domain;

use App\BussinesLogic\DAO\UserDao;
use App\Repository\UserRepository;
use Illuminate\Http\Exceptions\HttpResponseException;

class FindUser
{
    // Placeholder for FindUser domain logic

    public static function execute(int $id)
    {
        // Logic to find a user by ID
        // This is a placeholder for actual find logic
        $dao = new UserDao(['id' => $id]);
        $user = (new UserRepository())->findById($dao);
        if ($user) {
            return [
                'status' => 200,
                'msg' => 'User found',
                'data' => $user
            ];
        }
        throw new HttpResponseException(response()->json([
            'status' => 404,
            'msg' => 'User not found'
        ], 404));
    }
}