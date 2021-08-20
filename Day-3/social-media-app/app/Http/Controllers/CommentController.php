<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use Facade\FlareClient\Http\Exceptions\InvalidData;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\CssSelector\Exception\InternalErrorException;

class CommentController extends Controller
{
    private $commentService;

    public function __construct(){
        $this->commentService = new CommentService;
    }

    public function createComment(Request $request){
        try{
            $response = $this->commentService->createComment($request);
        }
        catch (InvalidData $e){
            Log::error($e->getMessage());
            return response()->json(json_decode($e->getMessage()), 400);
        }
        catch (InternalErrorException $e){
            Log::error($e->getMessage());
            return response()->json($e->getMessage(), 500);
        }
        return $response;
    }

    public function getCommentsByParams(Request $request){
        try{
            $response = $this->commentService->getCommentsByParams($request);
        }
        catch (InvalidData $e){
            Log::error($e->getMessage());
            return response()->json(json_decode($e->getMessage()), 400);
        }
        return $response;
    }

    public function updateComment(Request $request, $id){
        try{
            $response = $this->commentService->updateComment($request, $id);
        }
        catch(ModelNotFoundException $e){
            Log::error($e->getMessage());
            return response()->json(json_decode($e->getMessage()), 400);
        }
        catch(InternalErrorException $e){
            Log::error($e->getMessage());
            return response()->json(json_decode($e->getMessage()), 400);
        }
        return $response;
    }

    public function deleteComment(Request $request, $id){
        try{
            $response = $this->commentService->deleteComment($request, $id);
        }
        catch (ModelNotFoundException $e){
            Log::error($e->getMessage());
            return response()->json($e->getMessage(), 400);
        }
        return $response;
    }
}
