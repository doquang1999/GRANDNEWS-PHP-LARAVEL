<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videos;
class VideosController extends Controller
{
     public $model;
    public function __construct()
    {

        $this->model = new Videos();

    }
    public function read(Request $request)
    {
        $data = $this->model->modelRead();
        return view("admin.videos_read",["data"=>$data]);
    }
    public function create(Request $request)
    {
       return view("admin.videos_create_update");
    }
    // chấm là location file , còn chéo là đường dẫn web.php
    public function createPost(Request $request)
    {
        $this->model->modelCreate();
        return redirect(url("admin/videos"));
    }
     public function update(Request $request,$id)
    {
        $record = $this->model->modelGetRecord($id);
        return view("admin.videos_create_update",["record"=>$record]);
    }
    public function updatePost(Request $request,$id)
    {
         $this->model->modelUpdate($id);
        return redirect(url("admin/videos"));
    }
    public function delete(Request $request,$id)
    {
        $this->model->modelDelete($id);
        return redirect(url('admin/videos'));
    }
}
