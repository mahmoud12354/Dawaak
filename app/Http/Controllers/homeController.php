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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use PDO;

use Symfony\Component\VarDumper\Caster\RedisCaster;

class homeController extends Controller
{
    public function dashboard(){
        if(AUth::check()){
            return view ('admin.Dashboard');
        }else{
            return view('login');
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
        if(Auth::check()){
            return view('donations');
        }else{
            return view('login');
        }
    }
    //----------------------------------------------
    
    public function rosheta(){
        if (Auth::check()){
            return view('rosheta');
        }else{
            return view('login');
        }
    }
    //----------------------------------------------
    public function profile(){
        if (Auth::check()){
            $users = auth()->user() ;
            return view('profile',compact('users'));
        }else{
            return view('login');
        }
    }
    //----------------------------------------------
    public function cart(){
        if (Auth::check()){
            return view('cart');
        }else{
            return view('login');
        }
    }
    // ---------------------------------------------
    public function uploadbestseller(Request $request)
    {
        $data = new bestseller;
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

        $data->save();

        return response()->json([
            'message' => 'product upload successful',
        ], 200);
    }

    //--------------------------------------------------
    public function uploadnewarrival(Request $request){
        $data1 = new newarrival;
        $image = $request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('productimage',$imagename);
        $data1->image = $imagename;

        $data1->title = $request->title;
        $data1->price= $request->price;
        $data1->highlights = $request->highlights;
        $data1->about = $request->about;
        $data1->dosage = $request->dosage;
        $data1->indications = $request->indications;
        $data1->specifications = $request->specifications;

        
        $data1 ->save();
        // return redirect()->back()->with('message','product added Successfully');
        return response()->json([
            'message' =>'product upload succefull',
        ],200);
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

            $donations->city=$request->city;
            $donations->Street_Name=$request->streetNo;
            $donations->bluiding_No=$request->bluidNo;
            $donations->floor=$request->floor;
            $donations->apartment=$request->apartment;
            $donations->land_mark=$request->landmark;
            
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
    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->oldpassword, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->newpassword)
        ]);

        return back()->with("success", "Password changed successfully!");
    }
    // ----------------------------------------------------------
    public function updateimage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('profileimage'), $imagename);
            
            // Update user's image path in the database
            
            User::whereId(auth()->user()->id)->update([
                'image' => $imagename
            ]);
    
            return back()->with('success', 'Your profile image updated successfully.');
        }
    
        return back()->with('error', 'Please upload an image.');
    }
}
