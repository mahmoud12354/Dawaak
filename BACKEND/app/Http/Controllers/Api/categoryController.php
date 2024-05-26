<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function Stomach() {
        $medicines = Category::where('type', 'Stomach')->get();
        return response()->json([
            'message'=> 'show data successfully',
            'data'=> $medicines
        ],200);
    }
    public function Cold() {
        $medicines = Category::where('type', 'Cold')->get();
        return response()->json([
            'message'=> 'show data successfully',
            'data'=> $medicines
        ],200);
    }
    public function Ear_Eye() {
        $medicines = Category::where('type', 'Ear_Eye')->get();
        return response()->json([
            'message'=> 'show data successfully',
            'data'=> $medicines
        ],200);
    }
    public function Painkillers() {
        $medicines = Category::where('type', 'Painkillers')->get();
        return response()->json([
            'message'=> 'show data successfully',
            'data'=> $medicines
        ],200);
    }
    public function Dermatologic() {
        $medicines = Category::where('type', 'Dermatologic')->get();
        return response()->json([
            'message'=> 'show data successfully',
            'data'=> $medicines
        ],200);
    }
    public function Diabetes() {
        $medicines = Category::where('type', 'Diabetes')->get();
        return response()->json([
            'message'=> 'show data successfully',
            'data'=> $medicines
        ],200);
    }
    public function Bones() {
        $medicines = Category::where('type', 'Bones')->get();
        return response()->json([
            'message'=> 'show data successfully',
            'data'=> $medicines
        ],200);
    }
    
    public function Teeth() {
        $medicines = Category::where('type', 'Teeth')->get();
        return response()->json([
            'message'=> 'show data successfully',
            'data'=> $medicines
        ],200);
    }
    
    public function medicine_supllies() {
        $medicines = Category::where('type', 'medicine_supllies')->get();
        return response()->json([
            'message'=> 'show data successfully',
            'data'=> $medicines
        ],200);
    }
    
    public function vitamins() {
        $medicines = Category::where('type', 'vitamins')->get();
        return response()->json([
            'message'=> 'show data successfully',
            'data'=> $medicines
        ],200);
    }
    public function Baby_Care() {
        $medicines = Category::where('type', 'Baby_Care')->get();
        return response()->json([
            'message'=> 'show data successfully',
            'data'=> $medicines
        ],200);
    }
    public function Skin_Care() {
        $medicines = Category::where('type', 'Skin_Care')->get();
        return response()->json([
            'message'=> 'show data successfully',
            'data'=> $medicines
        ],200);
    }
    public function Daily_Care() {
        $medicines = Category::where('type', 'Daily_Care')->get();
        return response()->json([
            'message'=> 'show data successfully',
            'data'=> $medicines
        ],200);
    }
    public function Heart() {
        $medicines = Category::where('type', 'Heart')->get();
        return response()->json([
            'message'=> 'show data successfully',
            'data'=> $medicines
        ],200);
    }
    public function all() {
        $medicines = Category::all();
        return response()->json([
            'message'=> 'show data successfully',
            'data'=> $medicines
        ],200);
    }
    

    //===================================================================
    public function uploadcategory(Request $request){
        // Validate request
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'type' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $data = new category;
        $image = $request->image;
    
        // Handle image upload
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('categoryimage'), $imagename);
        $data->image = $imagename;
    
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->type = $request->type;
    
        $data->save();
    
        return response()->json([
            'message' => 'Product upload successful',
        ], 200);
    }
    
    public function search(Request $request){
        $search = $request->search;
        $medicines=category::where('title','Like','%'.$search.'%')->get();
        return response()->json([
            'data'=> $medicines
        ],200);
    }
}
