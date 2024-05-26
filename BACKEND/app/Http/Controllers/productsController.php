<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\bestseller;
use Illuminate\Http\Request;
use App\Models\newarrival;

class productsController extends Controller
{
    public function viewMedicine($id){
        $bestseller = bestseller::find($id);
        return view('view', compact('bestseller'));
    }
    
}
