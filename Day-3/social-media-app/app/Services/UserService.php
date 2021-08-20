<?php

namespace App\Services;
use Facade\FlareClient\Http\Exceptions\InvalidData;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Validators\UserValidator;
use Symfony\Component\CssSelector\Exception\InternalErrorException;


class UserService extends Service {

    public function createUser(Request $request){
        $validator = UserValidator::createUserValidator($request);

        if ($validator->fails()) {
            throw new InvalidData($validator->errors());
        }

        $user = new User;
        $data = $request->only($user->getFillable());
        if($user->fill($data)->save()){
            return response()->json($user, 201);
        }
        else{
            throw new InternalErrorException("User is not registered, try registering again");
        }
    }

    public function getAllUsers(Request $request){
        $dataArray = User::all();
        return response()->json(array('data' => json_decode($dataArray)), 200);
    }

    public function getUserById(Request $request, $id){
        $user = User::findorFail($id);
        return response()->json(array('data' => json_decode($user)), 200);
    }

    public function deleteUser(Request $request, $id){
        User::findorFail($id)->delete();
        return response()->json(array('data' => "user deleted"), 200);
    }
}
