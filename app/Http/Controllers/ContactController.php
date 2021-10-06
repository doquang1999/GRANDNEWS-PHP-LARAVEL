<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use DB;
class ContactController extends Controller
{
    public $model;
    public function __construct()
    {

        $this->model = new Contact();
    }
       public function read(Request $request)
    {
        $data = $this->model->modelRead();
        return view("admin.contact_read",["data"=>$data]);
    }
        public function create(Request $request)
    {
       return view("frontend.contact");
    }
    // chấm là location file , còn chéo là đường dẫn web.php
    public function createPost(Request $request)
    {
        $this->model->modelCreate();
        return view("frontend.contactsuc");
    }
       public function delete(Request $request,$id)
    {
        $this->model->modelDelete($id);
        return redirect(url('admin/contact'));
    }
     public function detail(Request $request,$id)
    {
        DB::table('contact')->where("id","=",$id)->update(["active"=>"1"]);
        $record = $this->model->modelGetRecord($id);
        return view("admin.contact_detail",["record"=>$record]);
    }
}
