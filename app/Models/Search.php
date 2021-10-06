<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Request;
class Search extends Model
{
     public function modelRead()
    {
        $search = Request::get("search");
        session()->put('search',$search);
        $data = DB::table("news")->where("title","LIKE","%".$search."%")->count();
         session()->put('soluong',$data);
        $data = DB::table("news")->where("title","LIKE","%".$search."%")->orderBy("id","desc")->paginate(8);
        return $data;
    }
}
