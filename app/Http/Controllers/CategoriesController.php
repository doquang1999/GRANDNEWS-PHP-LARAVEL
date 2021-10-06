<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
class CategoriesController extends Controller
{
    public $model;
    public function __construct()
    {
        $this->model = new Categories();
    }
    public function read(Request $request)
    {
        $data = $this->model->modelRead();
        return view("admin.categories_read",["data"=>$data]);
    }
        public function update(Request $request,$id)
    {
        $record = $this->model->modelGetRecord($id);
        return view("admin.categories_create_update",["record"=>$record]);
    }
    public function updatePost(Request $request,$id)
    {
        $this->model->modelUpdate($id);
        return redirect(url("admin/categories"));
    }
    public function create(Request $request)
    {
       return view("admin.categories_create_update");
    }
    // chấm là location file , còn chéo là đường dẫn web.php
    public function createPost(Request $request)
    {
        $this->model->modelCreate();
        return redirect(url("admin/categories"));
    }
    public function delete(Request $request,$id)
    {
        $this->model->modelDelete($id);
        return redirect(url('admin/categories'));
    }
}
