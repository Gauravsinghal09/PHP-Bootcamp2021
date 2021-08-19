<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PostService extends Service {

    public static function createPost(Request $request){

        $validator = Validator::make($request->all(), [
            'body' => 'required|max:255',
            'location' => 'required|max:255',
            'mood' => ['required', Rule::in('happy', 'sad')],
            'user_id'=>'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $post = new Post;
        $data = $request->only($post->getFillable());
        $post->fill($data)->save();
        return response()->json($post, 200);
    }

    public static function getAllPostsByUserId(Request $request, $user_id){
        if(User::where('id', $user_id)->exists()){
            $posts = User::find($user_id)->posts;
            return response()->json($posts, 200);
        }
        return response()->json("UserId does not exist", 200);

    }

}
