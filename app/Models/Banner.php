<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Request;
class Banner extends Model
{
      public function modelRead()
    {
        $data = DB::table("banner")->orderBy("id","desc")->paginate(10);
        return $data;
    }
        public function modelGetRecord($id)
    {
        $record = DB::table("banner")->where("id","=",$id)->first();
        return $record;
    }
         public function modelUpdate($id)
    {
        //update bản ghi
        if (Request::hasFile("photo")) {
         $oldPhoto = DB::table("banner")->where("id","=",$id)->select("photo")->first();
        if (isset($oldPhoto->photo) && file_exists('upload/banners/'.$oldPhoto->photo) && $oldPhoto->photo != "") {
            unlink('upload/banners/'.$oldPhoto->photo);
        }
        // lấy tên file
        $photo = time()."_".Request::file("photo")->getClientOriginalName();
        // thực hiện upload ảnh
        Request::file("photo")->move('upload/banners',$photo);
        // update bản ghi
        DB::table("banner")->where("id","=",$id)->update(['photo'=>$photo]);
        // ---
        }   
    }
}
