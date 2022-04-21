<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockController extends Controller
{
    public function getDataProduct(){
        $path = base_path()."/DummyData/Stock.json";
        $json = json_decode(file_get_contents($path),true);
        return response()->json($json);
    }
}
