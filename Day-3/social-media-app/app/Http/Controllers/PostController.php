<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostService;

class PostController extends Controller
{
    public function createPost(Request $request){
        return PostService::createPost($request);
    }

    public function getAllPostsByUserId(Request $request, $user_id){
        return PostService::getAllPostsByUserId($request, $user_id);
    }

    public function getPostsByParams(Request $request){
        return PostService::getPostsByParams($request);
    }
}
