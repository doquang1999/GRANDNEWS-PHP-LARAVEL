<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Request;
class Categories extends Model
{
    public function modelRead()
    {
        $data = DB::table("categories")->orderBy("id","desc")->paginate(10);
        return $data;
    }
    public function modelGetRecord($id)
    {
        $record = DB::table("categories")->where("id","=",$id)->first();
        return $record;
    }
    public function modelUpdate($id)
    {
        $location = Request::get("location");
        $name = Request::get("name");
        $display_home = Request::get("display_home")?1:0;
        DB::table("categories")->where("id","=",$id)->update(["name"=>$name,"location"=>$location,"display_home"=>$display_home]);
    }
    public function modelCreate()
    {
         $location = Request::get("location");
        $name = Request::get("name");
        $display_home = Request::get("display_home")?1:0;
        DB::table("categories")->insert(["name"=>$name,"location"=>$location,"display_home"=>$display_home]);
    }
    public function modelDelete($id)
    {
       
        DB::table("categories")->where("id","=",$id)->delete();
    }
}
