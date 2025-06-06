<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    public function index(UserService $userService){
        // dd($userService->listUsers());
        return view('users.index' , ['users' => $userService->listUsers()]);
    }

    public function first(UserService $userService){
        return collect($userService->listUsers())->first();
    }

    public function show(UserService $userService, $id){
        $user = collect ($userService->listUsers())->filter(function($item) use ($id){
            return $item['id'] == $id;
        })-> first();

        return $user;
    }
}
