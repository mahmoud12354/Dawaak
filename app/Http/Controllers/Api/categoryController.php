<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\category;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Illuminate\Support\Facades\Log;
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
    public function Dones() {
        $medicines = Category::where('type', 'Dones')->get();
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
    
    public function medicine_supllie() {
        $medicines = Category::where('type', 'medicine_supllie')->get();
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
        $data = new category;
        $image = $request->image;

        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('categoryimage',$imagename);
        $data->image = $imagename;

        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->type = $request->type;

        $data ->save();
        // return redirect()->back()->with('message','product added Successfully');
        return response()->json([
            'message' =>'product upload successfull',
        ],200);
    }
    // -------------------------------------------------------------------
    public function search(Request $request){
        $search = $request->search;
        $medicines=category::where('title','Like','%'.$search.'%')->get();
        return response()->json([
            'data'=> $medicines
        ],200);
    }
    //---------------------------------------------------------------------
    public function addcart(Request $request, $id)
    {
        // Find the product by its ID
        $product = Category::where('id', $id)->first();
        
        // Check if the product exists
        if (!$product) {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        } 
    
        // Create a new cart instance and populate it with the request data
        $cart = new cart();
        $cart->name = $request->name;
        $cart->phone = $request->phone;
        $cart->email = $request->email;
        $cart->product_title = $product->title;
        $cart->Total = $product->price;
        $cart->quantity = $request->quantity;
        $cart->street_name = $request->street;
        $cart->bluid_No = $request->bluidNo;
        $cart->floor = $request->floor;
        $cart->apartment = $request->apartment;
        $cart->landmark = $request->landmark;
    
        // Save the cart instance to the database
        $cart->save();
    
        // Return a JSON response with a success message and the cart data
        return response()->json([
            'message' => 'Product added to cart successfully',
            'cart' => $cart
        ], 200);
    }
    //-----------------------------------------------------------------------------------
    public function addtocartg($id){
        $category = Category::find($id);  // Assuming 'category' should be 'Category'

        // Retrieve the cart from the session, or initialize it as an empty array if it doesn't exist
        $cart = session()->get('cart', []);
    
        // Add the item to the cart
        $cart[$id] = [
            "product_name" => $category->title,
            "price" => $category->price,
            "photo" => $category->image,
            "quantity" => 1
        ];
    
        // Put the updated cart back into the session
        session()->put('cart', $cart);
    
        return response()->json([
            'cart' => $cart,
            'message' => 'The product was added to the cart successfully'
        ], 200);
    }
    // ---------------------------------------------------------------
    public function uploadToCart(Request $request ){
        
        $products = session()->get('cart',[]);
        $cart = new cart();
        
        $cart->name = $request->username;
        $cart->phone = $request->phone;
        $cart->email = $request->email; // No need to use implode here
        foreach ($products as $id =>$item){
            $cart->product_title = substr($item['product_name'], 0, 1000);
            $cart->Total = substr($item['price'], 0, 1000);
        }
        $cart->city = $request->city;
        $cart->street_name = $request->streetname;
        $cart->bluid_No = $request->bluidNo;
        $cart->floor = $request->floor;
        $cart->apartment = $request->apartment;
        $cart->landmark = $request->landmark;
        
        $cart->save();
        session()->forget('cart');
        
        return response()->json([
            'message' => 'products added to cart succussfully',
            'products' => $cart
        ]);
    }
}