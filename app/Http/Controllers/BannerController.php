<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
class BannerController extends Controller
{
    public $model;
    public function __construct()
    {

        $this->model = new Banner();

    }
       public function read(Request $request)
    {
        $data = $this->model->modelRead();
        return view("admin.banner_read",["data"=>$data]);
    }
         public function update(Request $request,$id)
    {
        $record = $this->model->modelGetRecord($id);
        return view("admin.banner_update",["record"=>$record]);
    }
    public function updatePost(Request $request,$id)
    {
         $this->model->modelUpdate($id);
        return redirect(url("admin/banners"));
    }
}
