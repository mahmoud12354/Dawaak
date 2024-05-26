<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function category(){
        return view('category');
    }
    //-------------------------------------------------------------------
    
    public function Stomach() {
        $medicines = Category::where('type', 'Stomach')->get();
        return view('medicine', ['medicine' => $medicines]);
    }
    public function Cold() {
        $medicines = Category::where('type', 'Cold')->get();
        return view('medicine', ['medicine' => $medicines]);
    }
    public function Ear_Eye() {
        $medicines = Category::where('type', 'Ear_Eye')->get();
        return view('medicine', ['medicine' => $medicines]);
    }
    public function Painkillers() {
        $medicines = Category::where('type', 'Painkillers')->get();
        return view('medicine', ['medicine' => $medicines]);
    }
    public function Dermatologic() {
        $medicines = Category::where('type', 'Dermatologic')->get();
        return view('medicine', ['medicine' => $medicines]);
    }
    public function Diabetes() {
        $medicines = Category::where('type', 'Diabetes')->get();
        return view('medicine', ['medicine' => $medicines]);
    }
    public function Dones() {
        $medicines = Category::where('type', 'Dones')->get();
        return view('medicine', ['medicine' => $medicines]);
    }
    
    public function Teeth() {
        $medicines = Category::where('type', 'Teeth')->get();
        return view('medicine', ['medicine' => $medicines]);
    }
    
    public function medicine_supllie() {
        $medicines = Category::where('type', 'medicine_supllie')->get();
        return view('medicine', ['medicine' => $medicines]);
    }
    
    public function vitamins() {
        $medicines = Category::where('type', 'vitamins')->get();
        return view('medicine', ['medicine' => $medicines]);
    }
    public function all() {
        $medicines = Category::all();
        return view('medicine', ['medicine' => $medicines]);
    }
    

    //===================================================================
    public function uploadcategory(Request $request)
    {
        $data = new category;
        $image = $request->image;

        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('productimage', $imagename);
        $data->image = $imagename;

        $data->title = $request->title;
        $data->price = $request->price;
        $data->highlights = $request->highlights;
        $data->about = $request->about;
        $data->dosage = $request->dosage;
        $data->indications = $request->indications;
        $data->specifications = $request->specifications;
        $data->type = $request->type;

        $data->save();
        // return redirect()->back()->with('message','product added Successfully');
        return redirect()->back()->with('message', 'product added Successfully');
    }
    //====================================================================
    public function addtocartg($id){
        $category = category::find($id);
        $cart = session()->get('cart',[]);
        
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }else{
            $cart[$id] = [
                "product_name"=> $category->title,
                "price"=> $category->price,
                "photo"=>$category->image,
                "quantity" => 1
            ];
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success','Product add to cart successfully');
    
    }
    //---------------------------------------------------------------------
    public function search(Request $request){
        $search = $request->search;
        $medicines=category::where('title','Like','%'.$search.'%')->get();
        return view('medicine', ['medicine' => $medicines]);
    }
    //---------------------------------------------------------------------
    
    
}



