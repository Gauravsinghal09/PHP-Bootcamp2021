<?php

namespace App\Validators;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserValidator extends Validator{

    public static function createUserValidator(Request $request){
        return Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:users',
        ]);
    }
}
