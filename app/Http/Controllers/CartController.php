<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getDataCart(){
        $path = base_path() ."/DummyData/Stock.json";
        $json = json_decode(file_get_contents($path),true);
        return response()->json($json);
        
    }
    public function addDataCart(Request $request){
        $path = base_path()."/DummyData/Container.json";
        $json = json_decode(file_get_contents($path),true);
        array_push($json, $request->post());
        return response()->json($json);
    }
}

