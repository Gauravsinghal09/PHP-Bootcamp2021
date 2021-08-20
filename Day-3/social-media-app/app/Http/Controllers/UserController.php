<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Exceptions\InvalidData;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Log;
use Symfony\Component\CssSelector\Exception\InternalErrorException;
use function MongoDB\BSON\toJSON;

class UserController extends Controller{

    private $userService;

    public function __construct(){
        $this->userService = new UserService;
    }

    public function createUser(Request $request){
        try{
            $response = $this->userService->createUser($request);
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

    public function getAllUsers(Request $request){
        return $this->userService->getAllUsers($request);
    }

    public function getUserById(Request $request, $id){
        try{
            $response = $this->userService->getUserById($request, $id);
        }
        catch (ModelNotFoundException $e){
            Log::error($e->getMessage());
            return response()->json($e->getMessage(), 400);
        }
        return $response;
    }

    public function deleteUser(Request $request, $id){
        try{
            $response = $this->userService->deleteUser($request, $id);
        }
        catch (ModelNotFoundException $e){
            Log::error($e->getMessage());
            return response()->json($e->getMessage(), 400);
        }
        return $response;
    }
}
