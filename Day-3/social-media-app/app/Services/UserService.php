<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\User;

class UserService extends Service {

    public static function createUser(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return response()->json($user, 201);
    }

    public static function getAllUsers(Request $request){
        return response()->json(User::get(), 200);
    }

    public static function getUserById(Request $request, $id){
        if(User::where('id', $id)->exists()){
            $user = User::where('id', $id)->get();
            return response()->json($user, 200);
        }
        return response()->json("User does not exist", 200);
    }

    public static function deleteUser(Request $request, $id){
        if(User::where('id', $id)->exists()){
            User::where('id', $id)->delete();
            return response()->json("user deleted", 200);
        }
        else{
            return response() -> json("user does not exist", 400);
        }
    }


}
