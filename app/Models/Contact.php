<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Request;
class Contact extends Model
{
    public function modelRead()
    {
        $data = DB::table("contact")->orderBy("id","desc")->paginate(10);
        return $data;
    }
        public function modelGetRecord($id)
    {
        $record = DB::table("contact")->where("id","=",$id)->first();
        return $record;
    }
    public function modelCreate()
    {
      $name = Request::get("full_name");
      $sdt = Request::get("sdt");
      $title = Request::get("title");
      $content = Request::get("content");
        $email = Request::get("email");
      DB::table("contact")->insert(["name"=>$name,"sdt"=>$sdt,"title"=>$title,"content"=>$content,"email"=>$email]);
    }
       public function modelDelete($id)
    {
       
        DB::table("contact")->where("id","=",$id)->delete();
    }
}
