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
        $product= bestseller::all();
        
        return response()->json([
            'message'=> 'show data successfully',
            'data'=> $product
        ],200);
    } 
    // ---------------------------------------
    public function shownewarrival()
    {
        $product1= newarrival::all();
        
        return response()->json([
            'message'=> 'show data successfully',
            'data'=> $product1
        ],200);
    }
    public function up(Request $request)
    {
        $donations = new donation();
        $donations->full_name=$request->fullname;
        $donations->email=$request->email;
        $donations->phone=$request->phone;
        $donations->address=$request->address;

        $donations->medical_name=$request->name;
        $donations->expired_date=$request->date;
        $donations->description=$request->description;
        $donations->save();
        return response()->json([
            'message'=> 'upload  data successfully',
            
        ],200);
        
    }
    public function uploadrosheta(Request $request){

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
        return response()->json([
            'message'=> 'show data successfully',
            'data'=> $roshetas,
            
        ],200);
    
    }
    // ----------------------------------------------------------------------
    
    // -----------------------------------------------------------------
    public function profile(Request $request){
        $users = $request->user();
        
        return response()->json([
            'message'=> 'show data successfully',
            'user'=> $users
        ],200);
    
    }
}