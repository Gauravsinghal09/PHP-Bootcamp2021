<?php

namespace App\Services;
use Facade\FlareClient\Http\Exceptions\InvalidData;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Validators\PostValidator;
use Symfony\Component\CssSelector\Exception\InternalErrorException;

class PostService extends Service {

    public function createPost(Request $request){

        $validator = PostValidator::createPostValidator($request);

        if ($validator->fails()) {
            throw new InvalidData($validator->errors());
        }

        $post = new Post;
        $data = $request->only($post->getFillable());
        if($post->fill($data)->save()){
            return response()->json(array("data" => $post), 200);
        }
        else{
            throw new InternalErrorException("Failed to create post, try again");
        }
    }

    public function getPostsByParams(Request $request){
        $validator = PostValidator::getPostsByParamsValidator($request);

        if ($validator->fails()) {
            throw new InvalidData($validator->errors());
        }

        $posts = Post::all();
        if($request->has('post_id')){
            $posts = $posts->where('id', $request->post_id);
        }

        if($request->has('user_id')){
            $posts = $posts->where('user_id', $request->user_id);
        }

        if($request->has('location')){
            $posts = $posts->where('location', $request->location);
        }

        if($request->has('mood')){
            $posts = $posts->where('mood', $request->mood);
        }

        return response()->json(array("data" => json_decode($posts->values())), 200);
    }
}
