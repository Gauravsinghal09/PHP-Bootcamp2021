<?php

namespace App\Services;
use Facade\FlareClient\Http\Exceptions\InvalidData;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Validators\CommentValidator;
use Symfony\Component\CssSelector\Exception\InternalErrorException;

//use Illuminate\Support\Facades\Validator;

class CommentService extends Service {

    public function createComment(Request $request){

        $validator = CommentValidator::createCommentValidator($request);

        if ($validator->fails()) {
            throw new InvalidData($validator->errors());
        }

        $comment = new Comment;
        $data = $request->only($comment->getFillable());
        if($comment->fill($data)->save()){
            return response()->json(array("data" => $comment), 200);
        }
        else{
            throw new InternalErrorException("Comment not created, try again");
        }
    }

    public function getCommentsByParams(Request $request){
        $validator = CommentValidator::getCommentsByParamsValidator($request);

        if ($validator->fails()) {
            throw new InvalidData($validator->errors());
        }


        $comments = Comment::all();
        if($request->has('comment_id')){
            $comments = $comments->where('id', $request->comment_id);
        }

        if($request->has('post_id')){
            $comments = $comments->where('post_id', $request->post_id);
        }

        return response()->json(array("data" => json_decode($comments->values())), 200);
    }

    public function updateComment(Request $request, $id){
        $validator = CommentValidator::updateCommentValidator($request);

        if ($validator->fails()) {
            throw new InvalidData($validator->errors());
        }

        $comment = Comment::find($id);
        $comment->body = is_null($request->body) ? $comment->body : $request->body;
        if($comment->save()){
            return response()->json(array("data" => $comment), 200);
        }
        else{
            throw new InternalErrorException("Failed to update comment, try again");
        }
    }

    public function deleteComment(Request $request, $id){
        Comment::findorFail($id)->delete();
        return response()->json(array('data' => "comment deleted"), 200);
    }
}
