<?php

namespace App\BussinesLogic\Domain;

use App\BussinesLogic\DAO\UserDao;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Hash;

class LoginUser
{

    public static function execute(array $credentials)
    {
        // Logic to login a user
        // This is a placeholder for actual login logic
        $dao = new UserDao($credentials);
        $userRepository = new UserRepository();
        $user = $userRepository->findOneBy($dao);
        if ($user && Hash::check($dao->getPassword(), $user->password)) {
            return [
                'status' => 200,
                'msg' => 'Login successful',
                'data' => $user,
                'token' => $user->createToken('auth_token', [], now()->addHours(24))->plainTextToken
            ];
        }
        return [
            'status' => 401,
            'msg' => 'Invalid credentials'
        ];
    }
}
