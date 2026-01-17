<?php

namespace App\BussinesLogic\DAO;

use App\BussinesLogic\ValueObject\ValueEmail;
use App\BussinesLogic\ValueObject\ValueId;
use App\BussinesLogic\ValueObject\ValueStringNotNull;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserDao
{
    private int $id;
    private string $username;
    private string $email;
    private string $password;
    private string $name;
    public function __construct(array $data)
    {
        try{
            $this->id = ValueId::generate(isset($data['id'])? $data['id'] : 0);
            $this->name = isset($data['name']) ? ValueStringNotNull::generate($data['name']) : '';
            $this->username = isset($data['username']) ? ValueStringNotNull::generate($data['username']) : '';
            $this->email = isset($data['email']) ? ValueEmail::generate($data['email']) : '';
            $this->password = isset($data['password']) ? ValueStringNotNull::generate($data['password']) : '';
        }catch(HttpResponseException $e){
            throw new HttpResponseException(response()->json([
                'status' => 400,
                'msg' => 'Dataset is invalid: ' . $e->getMessage()
            ], 400));
        }
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