<?php

namespace App\BussinesLogic\Domain;

use App\BussinesLogic\DAO\UserDao;
use App\Repository\UserRepository;
use Illuminate\Http\Exceptions\HttpResponseException;

class DeleteUser
{
    public static function execute(int $id)
    {
        // Logic to delete a user
        // This is a placeholder for actual delete logic
        $dao = new UserDao(['id' => $id]);
        $user = (new UserRepository())->findById($dao);
        if ($user) {
            return [
                'status' => 200,
                'msg' => "Is the user with $id deleted?: " . (new UserRepository())->delete($user)
            ];
        }
        throw new HttpResponseException(response()->json([
            'status' => 404,
            'msg' => 'User not found'
        ], 404));
    }
}
