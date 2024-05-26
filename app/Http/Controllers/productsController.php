<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\bestseller;
use App\Models\category;
use Illuminate\Http\Request;
use App\Models\newarrival;

class productsController extends Controller
{
    public function viewMedicine($id){
        $category = category::find($id);
        return view('view', compact('category'));
    }
    
}
