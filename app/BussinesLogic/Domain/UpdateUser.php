<?php

namespace App\BussinesLogic\Domain;

use App\BussinesLogic\DAO\UserDao;
use App\Repository\UserRepository;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateUser
{
    // Placeholder for UpdateUser domain logic
    public static function execute(int $id, array $data)
    {
        // Logic to update a user
        // This is a placeholder for actual update logic
        $data = array_filter($data, fn($value) => !is_null($value) && $value !== '');
        $data['id'] = $id;
        $userDao = new UserDao($data);
        $user = (new UserRepository())->findById($userDao);
        if (!$user) {
            throw new HttpResponseException(response()->json([
                'status' => 404,
                'msg' => 'User not found'
            ], 404));
        }
        $updatedUser = (new UserRepository())->update($userDao, $user);
        if (!$updatedUser) {
            throw new HttpResponseException(response()->json([
                'status' => 400,
                'msg' => 'User could not be updated'
            ], 400));
        }
        return [
            'status' => 200,
            'msg' => "User with ID $id updated successfully",
            'data' => $user
        ];
    }
}