<?php

namespace App\Repository;

use App\Models\User;
use App\BussinesLogic\DAO\UserDao;

class UserRepository
{
    public function create(UserDao $userDao)
    {
        // Logic to persist the user data to the database
        // This is a placeholder implementation
        $user = new User([
            'username' => $userDao->getUsername(),
            'name' => $userDao->getName(),
            'email' => $userDao->getEmail(),
            'password' => $userDao->getPassword()
        ]);
        $user->save();
        return $user;
    }

    public function exists(UserDao $userDao) : bool {
        // Logic to check if a user exists
        // This is a placeholder implementation
        return User::where('email', '=', $userDao->getEmail())->count() > 0;
    }

    public function findOneBy(UserDao $userDao) : User|null {
        // Logic to find a user by certain criteria
        // This is a placeholder implementation
        return User::where('email', '=', $userDao->getEmail())->first();
    }

    public function findBy(UserDao $userDao) : User|null{
        // Logic to find a user by certain criteria
        // This is a placeholder implementation
        return User::where([
            'email', '=', $userDao->getEmail(),
            'name', '=', $userDao->getName(),
            'username', '=', $userDao->getUsername()
        ])->first();
    }
}