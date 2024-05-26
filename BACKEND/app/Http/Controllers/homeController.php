<?php

namespace App\Http\Controllers;
use App\Models\bestseller;
use App\Http\Controllers\Controller;
use App\Models\newarrival;
use App\Models\cart;
use App\Models\category;
use App\Models\donation;
use App\Models\User;
use App\Models\rosheta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDO;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class homeController extends Controller
{
    public function dashboard(){
        if (Auth::check()){
            return view ('admin.Dashboard');
        }else{
            return view('../login');
        }
    }
    //----------------------------------------------
    public function product(){
        return view('admin.product');
    }
    //----------------------------------------------
    public function product1(){
        return view('admin.product1');
    }
    // ---------------------------------------------
    public function product2(){
        return view('admin.category');
    }
    // ---------------------------------------------
    public function Donors(){
        $donor = donation::all();
        return view('admin.Donors', compact('donor'));
    }
    //----------------------------------------------
    public function allmedincine(){
        $medicines = category::all();
        return view('admin.medicines', compact('medicines'));
    }
    // -----------------------------------------------
    public function Users(){
        $user = User::all();
        return view('admin.Users', compact('user'));
    }
    //----------------------------------------------
    public function adminrosheta(){
        $roshetas = rosheta::all();
        return view('admin.rosheta',compact('roshetas'));
    }
    //----------------------------------------------
    public function donation(){
        return view('donations');
    }
    //----------------------------------------------
    
    public function rosheta(){
        return view('rosheta');
    }
    //----------------------------------------------
    public function uploadbestseller(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'image' => 'required|image',
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'highlights' => 'nullable|string',
            'about' => 'nullable|string',
            'dosage' => 'nullable|string',
            'indications' => 'nullable|string',
            'specifications' => 'nullable|string',
        ]);
    
        // Handle the image upload
        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('productimage', $imagename);
    
        // Create a new bestseller instance
        $data = new bestseller;
        $data->image = $imagename;
        $data->title = $validatedData['title'];
        $data->price = $validatedData['price']; // This is now guaranteed to be a numeric value
        $data->highlights = $validatedData['highlights'];
        $data->about = $validatedData['about'];
        $data->dosage = $validatedData['dosage'];
        $data->indications = $validatedData['indications'];
        $data->specifications = $validatedData['specifications'];
    
        // Save the data to the database
        $data->save();
    
        return response()->json([
            'message' => 'Product upload successful',
        ], 200);
    }
    

    //--------------------------------------------------
    public function uploadnewarrival(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'image' => 'required|image',
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'highlights' => 'nullable|string',
            'about' => 'nullable|string',
            'dosage' => 'nullable|string',
            'indications' => 'nullable|string',
            'specifications' => 'nullable|string',
        ]);
    
        // Handle the image upload
        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('productimage', $imagename);
    
        // Create a new newarrival instance
        $data1 = new newarrival;
        $data1->image = $imagename;
        $data1->title = $validatedData['title'];
        $data1->price = $validatedData['price']; // This is now guaranteed to be a numeric value
        $data1->highlights = $validatedData['highlights'];
        $data1->about = $validatedData['about'];
        $data1->dosage = $validatedData['dosage'];
        $data1->indications = $validatedData['indications'];
        $data1->specifications = $validatedData['specifications'];
    
        // Save the data to the database
        $data1->save();
    
        return response()->json([
            'message' => 'Product upload successful',
        ], 200);
    }
    
    // ------------------------------------------------------------------
    
    public function index()
    {
        if (Auth::check()){
            $product= bestseller::all();
            $product1= newarrival::all();
            return view('welcome', compact('product', 'product1'));
        }else{
            return view('login');
        }
    }
    //--------------------------------------------------------------
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
    
    //-----------------------------------------------------------------------------------------
    public function addtocartn($id){
        $newarrival = newarrival::find($id);
        $cart = session()->get('cart',[]);
        
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }else{
            $cart[$id] = [
                "product_name"=> $newarrival->title,
                "price"=> $newarrival->price,
                "photo"=>$newarrival->image,
                "quantity" => 1
            ];
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success','Product add to cart successfully');
    
    }
//-----------------------------------------------------------------------------------------
    
    // ----------------------------------------------------------------------------------
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
    //-----------------------------------------------------------------------------------------
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }
    //-----------------------------------------------------------------------------------------
    public function up(Request $request)
    {
        if(auth::id()){
            $users=auth()->user();
            $donations = new donation();
            $donations->full_name=$request->fullname;
            $donations->email=$users->email;
            $donations->phone=$users->phone;
            $donations->address=$request->address;

            $donations->medical_name=$request->name;
            $donations->expired_date=$request->date;
            $donations->description=$request->description;
            $donations->save();
            return redirect()->back()->with('message','Donations add  successfully');
        }
        else{
            return redirect('login');
        }
    }
    // ------------------------------------------------------
    public function uploadrosheta(Request $request){
        if(auth::id()){
            $users=auth()->user();
            $roshetas = new rosheta();
            $roshetas->email=$users->email;
            $roshetas->phone=$users->phone;

            $image = $request->image;
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('roshetaimage',$imagename);
            $roshetas->image = $imagename;
            $roshetas->description=$request->description;

            $roshetas->full_name=$request->fullname;
            
            $roshetas->city=$request->city;
            $roshetas->Street_Name=$request->streetNo;
            $roshetas->bluiding_No=$request->bluidNo;
            $roshetas->floor=$request->floor;
            $roshetas->apartment=$request->apartment;
            $roshetas->land_mark=$request->landmark;
            $roshetas->save(); // Save the roshetas object to the database

            return redirect()->back()->with('message','roshate add  successfully');
        
        }else{
            return redirect('login');
        }

    }
    
    // ------------------------------------------------------
    
}
