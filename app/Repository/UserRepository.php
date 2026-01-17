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

    public function exists(UserDao $userDao): bool
    {
        // Logic to check if a user exists
        // This is a placeholder implementation
        return User::where('email', '=', $userDao->getEmail())->count() > 0;
    }

    public function update(UserDao $userDao, User $user): User | null
    {
        $user->fill([
            'username' => $userDao->getUsername() ? $userDao->getUsername(): $user->username,
            'name' => $userDao->getName() ? $userDao->getName() : $user->name,
            'email' => $userDao->getEmail() ? $userDao->getEmail(): $user->email,
            'password' => $userDao->getPassword() ? $userDao->getPassword(): $user->password
        ]);
        if ($user->save()) {
            return $user;
        }
        return null;
    }

    public function findById(UserDao $userDao): User|null
    {
        // Logic to find a user by ID
        // This is a placeholder implementation
        return User::find($userDao->getId());
    }

    public function delete(User $user)
    {
        // Logic to delete a user
        // This is a placeholder implementation
        return $user->delete();
    }

    public function findOneBy(UserDao $userDao): User|null
    {
        // Logic to find a user by certain criteria
        // This is a placeholder implementation
        return User::where('email', '=', $userDao->getEmail())->first();
    }

    public function findBy(UserDao $userDao): User|null
    {
        // Logic to find a user by certain criteria
        // This is a placeholder implementation
        return User::where([
            'email',
            '=',
            $userDao->getEmail(),
            'name',
            '=',
            $userDao->getName(),
            'username',
            '=',
            $userDao->getUsername()
        ])->first();
    }
}
