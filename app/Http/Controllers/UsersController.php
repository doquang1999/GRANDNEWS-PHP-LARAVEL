<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
class UsersController extends Controller
{
    public function read(Request $request)
    {
        $data = DB::table("users")->orderBy("id","desc")->paginate(10);
        return view("admin.users_read",["data"=>$data]);
    }
      public function update(Request $request, $id)
    {
      // lấy một bản ghi
        $action = url('admin/users/update/$id');
        $record = DB::table("users")->where("id",$id)->first();
        return view('admin.users_create_update',['record'=>$record]);
    }

    public function updatePost(Request $request , $id)
    {
        $name = $request->get("name");
        $password = $request->get("passoword");
        DB::table("users")->where("id",$id)->update(['name'=>$name]);
        // nếu password không rỗng thì update password
        if ($password!="") {
            $password = Hash::make($password);
            DB::table("users")->where("id",$id)->update(['password'=>$password]);
        }
        return redirect(url('admin/users'));
    }

//create - GET
    public function create(Request $request){
        //tao action de dua vao thuoc tinh action cua the form
        $action = url('admin/users/create');
        return view('admin.users_create_update');
    }
    //create - POST
    public function createPost(Request $request){

        $name = $request->get("name");
        $email = $request->get("email");
        $password = $request->get("password");
        //ma hoa password
        $password = Hash::make($password);
        //insert name
        
        $check = DB::table("users")->where("email","=",$email)->count();
        if ($check > 0) {
              return redirect(url('admin/users/create?notify=email-exists'));  
        }
        else
        {
            DB::table("users")->insert(['name'=>$name,'email'=>$email,'password'=>$password]);
             //di chuyen den mot url khac
             return redirect(url('admin/users'));
        }
      
    }

    //delete
    public function delete(Request $request, $id){
        //lay mot ban ghi
        //first() -> lay mot ban ghi
        DB::table("users")->where("id",$id)->delete();
        //di chuyen den mot url khac
        return redirect(url('admin/users'));
    }
}

