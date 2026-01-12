<?php

namespace App\BussinesLogic\DAO;

use App\BussinesLogic\ValueObject\ValueEmail;
use App\BussinesLogic\ValueObject\ValueId;
use App\BussinesLogic\ValueObject\ValueStringNotNull;

class UserDao
{
    private int $id;
    private string $username;
    private string $email;
    private string $password;
    private string $name;
    public function __construct(array $data)
    {
        $this->id = ValueId::generate($data['id']);
        $this->name = ValueStringNotNull::generate($data['name']);
        $this->username = ValueStringNotNull::generate($data['username']);
        $this->email = ValueEmail::generate($data['email']);
        $this->password = ValueStringNotNull::generate($data['password']);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getName(): string
    {
        return $this->name;
    }
}