<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\admin;
class admincontroller extends Controller
{
     //function to create a new admin. 'id','user_id','name','phone','location'
     public function create(Request $request){
        $validateadmin= $request->validate([
            'id'=>'required',
            'user_id'=>'required',
            'name'=>'required',
            'phone'=>'required',
            'location'=>'required'
        ]);

        $newadmin = admin::create([
            'id'=> $validateadmin['id'],
            'user_id'=>$validateadmin['user_id'],
            'name'=>$validateadmin['name'],
            'phone'=>$validateadmin['phone'],
            'location'=>$validateadmin['location'],
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        $reply = Array();

        if($newadmin){
            $reply['responsetype']="success";
            $reply['message']="Your new admin profile has been created!";
        }else{
            $reply['responsetype']="fail";
            $reply['message']="failed to create profile!";
        }
        return response()->json($reply);
    }

    //this function will return all admins.
    public function alladmins(){
        $alladmin= DB::table('admin')->get();
        if($alladmin->isEmpty()){
            $reply =  Array();
            $reply['responsetype'] = "fail";
            $reply['message']="Failed to  load admins";
            
            return response()->json($reply);
        }

        return response()->json($alladmin);
    }

    //get a single admin info.
    public function admin($id){
        $admin = DB::table('admin')->where('id',$id)->get();
        if($admin->isEmpty()){
            $reply =  Array();
            $reply['responsetype'] = "fail";
            $reply['message']="Failed to  delete admin";
            
            return response()->json($reply);
        }

        return response()->json($admin);
    }

    //function will delete a admin.
    public function deleteadmin($id){
        $to_delete_admin=DB::table('admin')->where('id',$id)->delete();
        if(!$to_delete_admin){
            $reply =  Array();
            $reply['responsetype'] = "fail";
            $reply['message']="Failed to  delete admin";
            
            return response()->json($reply);
        }

        return response()->json($to_delete_admin);
    }
}
