<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function createComment(Request $request){
        return CommentService::createComment($request);
    }

    public function getCommentsByParams(Request $request){
        return CommentService::getCommentsByParams($request);
    }
}
