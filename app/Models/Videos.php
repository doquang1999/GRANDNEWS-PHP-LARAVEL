<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Request;
class Videos extends Model
{
     public function modelRead()
    {
        $data = DB::table("video")->orderBy("id","desc")->paginate(10);
        return $data;
    }
        public function modelGetRecord($id)
    {
        $record = DB::table("video")->where("id","=",$id)->first();
        return $record;
    }
    public function modelCreate()
    {
        $title = Request::get("title");
        $link = Request::get("link");
        $photo = "";
        // nếu có ảnh thì upload ảnh
        if (Request::hasFile("photo")) {
            $photo = time()."_".Request::file("photo")->getClientOriginalName();
            //thực hiện upload ảnh
            Request::file("photo")->move('upload/videos',$photo);
        }
        //insert bản ghi
        DB::table("video")->insert(["title"=>$title,"photo"=>$photo,"link"=>$link]);
    }
       public function modelUpdate($id)
    {
        $title = Request::get("title");
        $link = Request::get("link");
        //update bản ghi
        DB::table("video")->where("id","=",$id)->update(["title"=>$title,"link"=>$link]);
        if (Request::hasFile("photo")) {
         $oldPhoto = DB::table("video")->where("id","=",$id)->select("photo")->first();
        if (isset($oldPhoto->photo) && file_exists('upload/videos/'.$oldPhoto->photo) && $oldPhoto->photo != "") {
            unlink('upload/videos/'.$oldPhoto->photo);
        }
        // lấy tên file
        $photo = time()."_".Request::file("photo")->getClientOriginalName();
        // thực hiện upload ảnh
        Request::file("photo")->move('upload/videos',$photo);
        // update bản ghi
        DB::table("video")->where("id","=",$id)->update(['photo'=>$photo]);
        // ---
        }   
    }
        public function modelDelete($id)
    {
          // ----
          $oldPhoto = DB::table("video")->where("id","=",$id)->select("photo")->first();
        if (isset($oldPhoto->photo) && file_exists('upload/videos/'.$oldPhoto->photo) && $oldPhoto->photo != "") 
            unlink('upload/videos/'.$oldPhoto->photo);  
         DB::table("video")->where("id","=",$id)->delete();
    }
}
