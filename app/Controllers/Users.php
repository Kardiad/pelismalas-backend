<?php

namespace App\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Users extends Controller{


    public static function testUser(){
        return Response()->json([
            'status' => 200,
            'msg' => 'Users controller is ok'
        ]);
    }


    public function createUser(Request $request){

    }

    public function updateUser(int $id, Request $request){
        
    }

    public function deleteUser(int $id){
        
    }

    public function getUser(int $id){

    }

}