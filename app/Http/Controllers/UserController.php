<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\RegisterResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(RegisterRequest $request){
        $validatedData = $request->validated();
        $userIp = request()->ip();

        $user = User::create($validatedData);
        if ($user) {
            Auth::login($user);
            return response()->json([
                'status' => 200,
                'message' => "Added Successfully",
                'data' => new RegisterResource($user)
            ], 200);
        } else {
            return response()->json([
                'status' => 422,
                'message' => "Nothing Found"
            ], 422);
        }
    }
}
