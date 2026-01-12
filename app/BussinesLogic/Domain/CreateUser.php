<?php

namespace App\BussinesLogic\Domain;

use App\BussinesLogic\DAO\UserDao;
use App\Repository\UserRepository;

class CreateUser
{
    // Code for creating a user will go here
    public static function execute(array $userData)
    {
        // Logic to create a user
        $dao = new UserDao($userData);
        $userRepository = new UserRepository();
        if($userRepository->exists($dao)){
            return response()->json([
                'status' => 409,
                'msg' => 'User already exists'
            ], 409);
        }
        return response()->json([
            'status' => 201,
            'msg' => 'User created successfully',
            'data' => $userRepository->create($dao)
        ], 201);
    }
}