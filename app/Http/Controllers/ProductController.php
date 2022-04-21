<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getDataProduct(){
        $path = base_path()."/mocking/dataProduct.json";
        $json = json_decode(file_get_contents($path),true);
        return response()->json($json);
    }
}
