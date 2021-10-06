<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Search;
use DB;
class SearchController extends Controller
{
      public $model;
    public function __construct()
    {
        $this->model = new Search();
    }
    public function read(Request $request)
    {
       
        $data = $this->model->modelRead();
        return view("frontend.search",["data"=>$data]);
    }
}
