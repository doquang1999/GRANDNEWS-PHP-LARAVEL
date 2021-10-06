<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Request;
use Session;
class News extends Model
{
    public function modelRead()
    {
        $data = DB::table("news")->orderBy("id","desc")->paginate(10);
        return $data;
    }
        public function modelGetRecord($id)
    {
        $record = DB::table("categories")->where("id","=",$id)->first();
        return $record;
    }
    public function modelGetRecord($id)
    {
        $record = DB::table("news")->where("id","=",$id)->first();
        return $record;
    }
    public function modelUpdate($id)
    {
        $title = Request::get("title");
        $categories_id = Request::get("category_id");
        $description = Request::get("description");
        $content = Request::get("content");
        $hot = Request::get("hot")?1:0;
        $tacgia = Session::get('name');
        //update bản ghi
        DB::table("news")->where("id","=",$id)->update(["title"=>$title,"categories_id"=>$categories_id,"description"=>$description,"content"=>$content,"hot"=>$hot,"tacgia"=>$tacgia]);
        // nếu có ảnh thì upload ảnh
        //---
        //select("photo") chỉ lấy trường dũ liệu có tên là photo
        if (Request::hasFile("photo")) {
               $oldPhoto = DB::table("news")->where("id","=",$id)->select("photo")->first();
        if (isset($oldPhoto0->photo) && file_exists('upload/news/'.$oldPhoto->photo) && $oldPhoto->photo != "") {
            unlink('upload/news/'.$oldPhoto->photo);
        }
        // lấy tên file
        $photo = time()."_".Request::file("photo")->getClientOriginalName();
        // thực hiện upload ảnh
        Request::file("photo")->move('upload/news',$photo);
        // update bản ghi
        DB::table("news")->where("id","=",$id)->update(['photo'=>$photo]);
        // ---
        }   
    }


      public function modelCreate()
    {
            $title = Request::get("title");
        $categories_id = Request::get("category_id");
        $description = Request::get("description");
        $content = Request::get("content");
        $hot = Request::get("hot")?1:0;
         $tacgia = Session::get('name');
        $photo = "";
        // nếu có ảnh thì upload ảnh
        if (Request::hasFile("photo")) {
            $photo = time()."_".Request::file("photo")->getClientOriginalName();
            //thực hiện upload ảnh
            Request::file("photo")->move('upload/news',$photo);
        }
        //insert bản ghi
        DB::table("news")->insert(["title"=>$title,"categories_id"=>$categories_id,"description"=>$description,"content"=>$content,"hot"=>$hot,"photo"=>$photo,"tacgia"=>$tacgia]);
    }

    public function modelDelete($id)
    {
          // ----
          $oldPhoto = DB::table("news")->where("id","=",$id)->select("photo")->first();
        if (isset($oldPhoto->photo) && file_exists('upload/news/'.$oldPhoto->photo) && $oldPhoto->photo != "") 
            unlink('upload/news/'.$oldPhoto->photo);  
         DB::table("news")->where("id","=",$id)->delete();
    }


}
