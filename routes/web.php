<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;

session_start();
Route::get('login',function(){
    return view('admin.login');
});
Route::post('login',function(){
    $email = Request::get("email");
    $password = Request::get("password");
    //Auth::attempt -> tra ve true neu email, password khop voi bang users
    $data = DB::table("users")->where("email","=",$email)->first();
    if(Auth::attempt(['email'=>$email,'password'=>$password]))
        session()->put('name', $data->name); 
        return redirect(url('admin/layout'));
    return redirect(url('login'));
});
//dang xuat
Route::get('logout',function(){
    Auth::logout();
    return redirect(url('login'));
});


Route::group(['prefix'=>'admin','middleware'=>'checklogin'],function(){

    Route::get('layout',function(){
    return view('admin.layout');
});

    
    // chức năng users - CRUD
    //read
    Route::get('users',[UsersController::class,'read']);
       Route::get('users/update/{id}',[UsersController::class,'update']);
          Route::post('users/update/{id}',[UsersController::class,'updatePost']);
            Route::get('users/create',[UsersController::class,'create']);
          Route::post('users/create',[UsersController::class,'createPost']);
           Route::get('users/delete/{id}',[UsersController::class,'delete']);

           // categoru


            Route::get('categories',[CategoriesController::class,'read']);
       Route::get('categories/update/{id}',[CategoriesController::class,'update']);
          Route::post('categories/update/{id}',[CategoriesController::class,'updatePost']);
            Route::get('categories/create',[CategoriesController::class,'create']);
          Route::post('categories/create',[CategoriesController::class,'createPost']);
           Route::get('categories/delete/{id}',[CategoriesController::class,'delete']);

// news

               Route::get('news',[NewsController::class,'read']);
       Route::get('news/update/{id}',[NewsController::class,'update']);
          Route::post('news/update/{id}',[NewsController::class,'updatePost']);
            Route::get('news/create',[NewsController::class,'create']);
          Route::post('news/create',[NewsController::class,'createPost']);
           Route::get('news/delete/{id}',[NewsController::class,'delete']);
    // video

                Route::get('videos',[VideosController::class,'read']);
       Route::get('videos/update/{id}',[VideosController::class,'update']);
          Route::post('videos/update/{id}',[VideosController::class,'updatePost']);
            Route::get('videos/create',[VideosController::class,'create']);
          Route::post('videos/create',[VideosController::class,'createPost']);
           Route::get('videos/delete/{id}',[VideosController::class,'delete']);

    // banner
             Route::get('banners',[BannerController::class,'read']);
       Route::get('banners/update/{id}',[BannerController::class,'update']);
          Route::post('banners/update/{id}',[BannerController::class,'updatePost']);
    // contact
            Route::get('contact',[ContactController::class,'read']);
              Route::get('contact/delete/{id}',[ContactController::class,'delete']);
               Route::get('contact/detail/{id}',[ContactController::class,'detail']);

});


// trang chủ

Route::get('/', function () {
    return view('frontend.layout_trangchu');
});

Route::get('news/category/{id}',function($categories_id){
    return view('frontend.category_news',["categories_id"=>$categories_id]);
});

Route::get('news/detail/{id}',function($id){
    return view('frontend.detail_news',["id"=>$id]);
});

Route::get('news/videos',function(){
    return view('frontend.videos_list');
});

Route::get('news/contact',[ContactController::class,'create']);
Route::post('news/contact',[ContactController::class,'createPost']);



Route::get('news/about',function(){
    return view('frontend.about');
});

Route::get('news/tintuc',function(){
    return view('frontend.allnews');
});

Route::get('/news/search',[SearchController::class,'read']);






