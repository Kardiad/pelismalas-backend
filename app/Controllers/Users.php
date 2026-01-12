<?php

namespace App\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use App\BussinesLogic\Domain\CreateUser;

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

    public function updateUser(int $id, Request $request){
        
    }

    public function deleteUser(int $id){
        
    }

    public function getUser(int $id){

    }

}