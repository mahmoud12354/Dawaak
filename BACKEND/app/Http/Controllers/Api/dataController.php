<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\bestseller;
use App\Models\newarrival;
use Illuminate\Support\Facades\Auth;
use App\Models\cart;
use App\Models\donation;
use App\Models\rosheta;
use App\Models\category;

class dataController extends Controller
{
    public function showbestseller()
    {
        $product = bestseller::all();

        return response()->json([
            'message' => 'show data successfully',
            'data' => $product
        ], 200);
    }
    // ---------------------------------------
    public function shownewarrival()
    {
        $product1 = newarrival::all();

        return response()->json([
            'message' => 'show data successfully',
            'data' => $product1
        ], 200);
    }
    public function up(Request $request)
    {
        $users = auth()->user();
        $donations = new donation();

        $donations->medical_name = $request->name;
        $donations->expired_date = $request->date;
        $donations->categ = $request->categ;

        $donations->full_name = $request->fullname;
        $donations->nationalID = $request->nationalID;
        $donations->phone = $request->phone;
        $donations->city = $request->city;
        $donations->street_name = $request->streetName; // Corrected from $request->streetNo
        $donations->building_No = $request->building_No; // Corrected from $request->bluidNo // Changed from $request->bluidNo
        $donations->floor = $request->floor;
        $donations->apartment = $request->apartment;
        $donations->land_mark = $request->landmark;

        $donations->save();
        return response()->json([
            'message' => 'upload  data successfully',
            'data' => $donations
        ], 200);
    }
    public function uploadrosheta(Request $request)
    {

        $users = auth()->user();
        $roshetas = new rosheta();
        $roshetas->email = $request->email;
        $roshetas->phone = $request->phone;

        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('roshetaimage', $imagename);
        $roshetas->image = $imagename;
        $roshetas->description = $request->description;
        $roshetas->full_name = $request->fullname;

        $roshetas->city = $request->city;
        $roshetas->Street_Name = $request->streetNo;
        $roshetas->bluiding_No = $request->bluidNo;
        $roshetas->floor = $request->floor;
        $roshetas->apartment = $request->apartment;
        $roshetas->land_mark = $request->landmark;
        $roshetas->save(); // Save the roshetas object to the database
        return response()->json([
            'message' => 'show data successfully',
            'data' => $roshetas
        ], 200);

    }
    // ----------------------------------------------------------------------
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
    ////////////////////





    ///////////////////////////////////////////
    public function profile(Request $request)
    {
        return response()->json([
            'message' => 'Show data successfully',
            'user' => $request->user()
        ], 200);
    }

}