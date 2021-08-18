<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function createUser(Request $request){
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->save();
        return response("User is Created", 201);
    }

    public function getAllUsers(Request $request){
        $users = DB::table('users')->get()->toJson(JSON_PRETTY_PRINT);
        return response($users, 200);
    }

    public function getUserById(Request $request, $id){
        $flag = User::where('id', $id)->exists();
        if($flag){
            $user = DB::table('users')->where('id', $id)->first();
            return response()->json($user, 200);
        }
        else{
            return response("User does not exist", 400);
        }
    }

    public function updateUser(Request $request, $id){
        $flag = User::where('id', $id)->exists();
        if($flag){
            $user = User::find($id);
            $user->first_name = is_null($request->first_name) ? $user->first_name : $request->first_name;
            $user->last_name = is_null($request->last_name) ? $user->last_name : $request->last_name;
            $user->save();
            return response()->json($user, 200);
        }
        else{
            return response("User does not exist", 400);
        }
    }

    public function deleteUser(Request $request, $id){
        $flag = User::where('id', $id)->exists();
        if($flag){
            $user = DB::table('users')->where('id', $id)->delete();
            return response()->json("User Deleted", 200);
        }
        else{
            return response("User does not exist", 400);
        }
    }
}
