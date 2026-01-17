<?php

namespace App\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use App\BussinesLogic\Domain\CreateUser;
use App\BussinesLogic\Domain\LoginUser;
use App\BussinesLogic\Domain\DeleteUser;
use App\BussinesLogic\Domain\FindUser;
use App\BussinesLogic\Domain\UpdateUser;

class Users extends Controller{


    public static function testUser(){
        return Response()->json([
            'status' => 200,
            'msg' => 'Users controller is ok'
        ]);
    }


    public function createUser(Request $request){
        return CreateUser::execute($request->all());
    }

    public function login(Request $request){
        return LoginUser::execute($request->all());
    }

    public function updateUser(int $id, Request $request){
        return UpdateUser::execute($id, $request->all());
    }

    public function deleteUser(int $id){
        return DeleteUser::execute($id);
    }

    public function getUser(int $id){
        return FindUser::execute($id);
    }

}