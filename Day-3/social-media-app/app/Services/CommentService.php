<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;

class CommentService extends Service {

    public static function createComment(Request $request){

        $validator = Validator::make($request->all(), [
            'body' => 'required|max:255',
            'post_id'=>'required|exists:posts,id'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $comment = new Comment;
        $data = $request->only($comment->getFillable());
        $comment->fill($data)->save();
        return response()->json($comment, 200);
    }

    public static function getAllCommentsByPostId(Request $request, $post_id){
        if(Post::where('id', $post_id)->exists()){
            $comments = User::find($post_id)->posts;
            return response()->json($comments, 200);
        }
        return response()->json("PostId does not exist", 200);
    }

    public static function getCommentsByParams(Request $request){
        $validator = Validator::make($request->all(), [
            'post_id' => 'nullable|exists:posts,id',
            'comment_id' => 'nullable|exists:comments,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $comments = Comment::all();
        if($request->has('comment_id')){
            $comments = $comments->where('id', $request->comment_id);
        }

        if($request->has('post_id')){
            $comments = $comments->where('post_id', $request->post_id);
        }

        return response()->json($comments, 200);
    }
}
