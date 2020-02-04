<?php

namespace App\Http\Controllers;
use App\client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class clientcontroller extends Controller
{
    //function to create a new client. 'id','user_id','name','phone','location'
    public function create(Request $request){
        $validateclient= $request->validate([
            'id'=>'required',
            'user_id'=>'required',
            'name'=>'required',
            'phone'=>'required',
            'location'=>'required'
        ]);

        $newclient = client::create([
            'id'=> $validateclient['id'],
            'user_id'=>$validateclient['user_id'],
            'name'=>$validateclient['name'],
            'phone'=>$validateclient['phone'],
            'location'=>$validateclient['location'],
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        $reply = Array();

        if($newclient){
            $reply['responsetype']="success";
            $reply['message']="Your new client profile has been created!";
        }else{
            $reply['responsetype']="fail";
            $reply['message']="failed to create profile!";
        }
        return response()->json($reply);
    }

    //this function will return all clients.
    public function allclients(){
        $allclient= DB::table('client')->get();
        if($allclient->isEmpty()){
            $reply =  Array();
            $reply['responsetype'] = "fail";
            $reply['message']="Failed to  load clients";
            
            return response()->json($reply);
        }

        return response()->json($allclient);
    }

    //get a single client info.
    public function client($id){
        $client = DB::table('client')->where('id',$id)->get();
        if($client->isEmpty()){
            $reply =  Array();
            $reply['responsetype'] = "fail";
            $reply['message']="Failed to  delete client";
            
            return response()->json($reply);
        }

        return response()->json($client);
    }

    //function will delete a client.
    public function deleteclient($id){
        $to_delete_client=DB::table('client')->where('id',$id)->delete();
        if(!$to_delete_client){
            $reply =  Array();
            $reply['responsetype'] = "fail";
            $reply['message']="Failed to  delete client";
            
            return response()->json($reply);
        }

        return response()->json($to_delete_client);
    }
}
