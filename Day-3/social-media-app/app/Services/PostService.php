<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\Post;

class PostService extends Service {

    public static function createPost(Request $request){
        $post = new Post;
        $post->body = $request->body;
        $post->location = $request->location;
        $post->mood = $request->mood;
        $post->user_id =  $request->user_id;
        $post->save();
        return response()->json($post, 200);
    }


}
