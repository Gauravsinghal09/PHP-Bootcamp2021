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
            'location' => 'nullable|min:1|max:255',
            'mood' => ['nullable|min:1', Rule::in('happy', 'sad', 'other')],
            'user_id' => 'required|exists:users,id'
        ]);
    }

    public static function getPostsByParamsValidator(Request $request)
    {
        return Validator::make($request->all(), [
            'post_id' => 'sometimes|exists:posts,id',
            'user_id' => 'sometimes|exists:users,id',
            'location' => 'sometimes|min:1',
            'mood' => ['sometimes|min:1', Rule::in('happy', 'sad', 'other')],
        ]);
    }
}
