<?php

namespace App\Validators;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PostValidator extends Validator
{

    public static function createPostValidator(Request $request)
    {
        return Validator::make($request->all(), [
            'body' => 'required|max:255',
            'location' => 'nullable|max:255',
            'mood' => ['nullable', Rule::in('happy', 'sad', 'other')],
            'user_id' => 'required|exists:users,id'
        ]);
    }

    public static function getPostsByParamsValidator(Request $request)
    {
        return Validator::make($request->all(), [
            'post_id' => 'nullable|exists:posts,id',
            'user_id' => 'nullable|exists:users,id',
            'location' => 'nullable',
            'mood' => ['nullable', Rule::in('happy', 'sad', 'other')],
        ]);
    }
}
