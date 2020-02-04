<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\vendor;

class vendorcontroller extends Controller
{
     
     public function create(Request $request){
        $validatevendor= $request->validate([
            'id'=>'required',
            'user_id'=>'required',
            'name'=>'required',
            'phone'=>'required',
            'location'=>'required'
        ]);

        $newvendor = vendor::create([
            'id'=> $validatevendor['id'],
            'user_id'=>$validatevendor['user_id'],
            'name'=>$validatevendor['name'],
            'phone'=>$validatevendor['phone'],
            'location'=>$validatevendor['location'],
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        $reply = Array();

        if($newvendor){
            $reply['responsetype']="success";
            $reply['message']="Your new vendor profile has been created!";
        }else{
            $reply['responsetype']="fail";
            $reply['message']="failed to create profile!";
        }
        return response()->json($reply);
    }

    //this function will return all vendors.
    public function allvendors(){
        $allvendor= DB::table('vendor')->get();
        if($allvendor->isEmpty()){
            $reply =  Array();
            $reply['responsetype'] = "fail";
            $reply['message']="Failed to  load vendors";
            
            return response()->json($reply);
        }

        return response()->json($allvendor);
    }

    //get a single vendor info.
    public function vendor($id){
        $vendor = DB::table('vendor')->where('id',$id)->get();
        if($vendor->isEmpty()){
            $reply =  Array();
            $reply['responsetype'] = "fail";
            $reply['message']="Failed to  load vendor";
            
            return response()->json($reply);
        }

        return response()->json($vendor);
    }

    //function will delete a vendor.
    public function deletevendor($id){
        $to_delete_vendor=DB::table('vendor')->where('id',$id)->delete();
        $reply =  Array();
        if(!$to_delete_vendor){
            
            $reply['responsetype'] = "fail";
            $reply['message']="Failed to  delete vendor";
            
            return response()->json($reply);
        }

        
        $reply['responsetype'] = "success";
        $reply['message']="Successfully deleted vendor!";
        
        return response()->json($reply);
    }
}
