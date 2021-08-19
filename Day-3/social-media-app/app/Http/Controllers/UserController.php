<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller{

    public function createUser(Request $request){
        return UserService::createUser($request);
    }

    public function getAllUsers(Request $request){
        return UserService::getAllUsers($request);
    }

    public function getUserById(Request $request, $id){
        return UserService::getUserById($request, $id);
    }

    public function deleteUser(Request $request, $id){
        return UserService::deleteUser($request, $id);
    }
}
