<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DetailController extends Controller
{
    public function index($id){
        $product=product::find($id);

        return view('detail', compact('product'));
    }

}
