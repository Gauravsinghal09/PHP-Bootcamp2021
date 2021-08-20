<?php

namespace App\Validators;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentValidator extends Validator
{
    public static function createCommentValidator(Request $request)
    {
        return Validator::make($request->all(), [
            'body' => 'required|max:255',
            'post_id' => 'required|exists:posts,id'
        ]);
    }

    public static function getCommentsByParamsValidator(Request $request)
    {
        return Validator::make($request->all(), [
            'post_id' => 'sometimes|exists:posts,id',
            'comment_id' => 'sometimes|exists:comments,id',
        ]);
    }

    public static function updateCommentValidator(Request $request)
    {
        return Validator::make($request->all(), [
            'body' => 'sometimes|min:1|max:255',
        ]);
    }
}
