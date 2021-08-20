<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Exceptions\InvalidData;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Services\PostService;
use Illuminate\Support\Facades\Log;
use Symfony\Component\CssSelector\Exception\InternalErrorException;

class PostController extends Controller
{
    private $postService;

    public function __construct(){
        $this->postService = new PostService;
    }

    public function createPost(Request $request){
        try{
            $response = $this->postService->createPost($request);
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

    public function getPostsByParams(Request $request){
        try{
            $response = $this->postService->getPostsByParams($request);
        }
        catch (InvalidData $e){
            Log::error($e->getMessage());
            return response()->json(json_decode($e->getMessage()), 400);
        }
        return $response;
    }

    public function updatePost(Request $request, $id){
        try{
            $response = $this->postService->updatePost($request, $id);
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

    public function deletePost(Request $request, $id){
        try{
            $response = $this->postService->deletePost($request, $id);
        }
        catch (ModelNotFoundException $e){
            Log::error($e->getMessage());
            return response()->json($e->getMessage(), 400);
        }
        return $response;
    }
}
