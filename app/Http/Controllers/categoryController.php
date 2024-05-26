<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\cart;
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
        $medicines = Category::where('type', 'Bones')->get();
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
    public function uploadToCart(Request $request ){
        
        $users=auth()->user();
        $cart = new cart();

        $cart->name = $users->username;
        $cart->phone = $users->phone;
        $cart->email = $users->email;
        $cart->Total = $request->total; // No need to use implode here
        if (is_array($request->product_names)) {
            $product_titles = implode(', ', $request->product_names);
            $cart->quantity = implode(', ', $request->quantity);
            
            // Truncate to fit within the maximum allowed length
            $cart->product_title = substr($product_titles, 0, 255); // Adjust length to match your column
        } else {

            $cart->product_title = substr($request->product_names, 0, 255); // Adjust length to match your column
            $cart->quantity = $request->quantity ; // Adjust length to match your column
        }
        $cart->city = $request->city;
        $cart->street_name = $request->streetname;
        $cart->bluid_No = $request->bluidNo;
        $cart->floor = $request->floor;
        $cart->apartment = $request->apartment;
        $cart->landmark = $request->landmark;
        
        $cart->save();
        
        session()->forget('cart');
        return redirect()->back()->with('success', 'products added to cart  Successfully we will come soon ');
    }
    //------------------------------------------------------------------------------------------------------------
    
}



