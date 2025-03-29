<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TaskController;
use App\Services\ProductService;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Services\UserService;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Response;

// Welcome
Route::get('/', function () {
    return view('welcome', ['name' => 'rafer-app']);
});
// Users
Route::get('/users', [UserController::class, 'index']);
// Products
Route::resource('products', ProductController::class);


//Exercise 2

// Service Container
Route::get('/test-container', function (Request $request) {
    $input = $request->input('key');
    return $input;
});

// Service Providers
Route::get('/test-provider', function (UserService $userService) {
    return $userService->listUsers();
});

//Service Provider
Route::get('/test-users', [UserController::class, 'index']);

//Facades
Route::get('/test-facades', function (UserService $userService) {
    return Response:: json ($userService->listUsers());
    
});


//Exercise 3

//Routing -> Parameters
Route::get('/post/{post}/comment/{comment}', function(string $postId, string $comment){
    return "Post ID: " . $postId . "- Comment: " . $comment;
});

Route::get('/post/{id}',function(string $id){
    return $id;
}) ->where('id', '[0-9]+');

Route::get('/search/{search}',function(string $search){
    return $search;
}) ->where('search', '.*');

//Named Route or Route Alias
Route::get('/test/route',function(){
    return route('test.route');
}) ->name('test.route');

//Route -> Middleware Group
Route::middleware(['user-middleware'])->group(function(){
    Route::get('route-middleware-group/first',function(Request $request){
        echo 'first';
    });
    Route::get('route-middleware-group/second',function(Request $request){
        echo 'second';
    });
});

//Route -> Controller
Route::controller(UserController::class)->group(function(){
    Route::get('/users', 'index');
    Route::get('/users/first', 'first');
    Route::get('/users/{id}', 'show');
});

// CSRF
Route::get('/token', function(Request $request){
    return view('token');
});

Route::post('/token', function(Request $request){
    return $request->all();
});

// Exercise 4
//Controller -> Middleware
// Route::get('/users', [UserController::class, 'index'])->middleware('user-middleware');

//Resource
// Route::resource('products', ProductController::class);

// View with data
Route::get('/product-list', function(ProductService $productService){
    $data['products'] = $productService->listProducts();
    return view('products.list', $data);
});

