<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\servicerequest;
use Illuminate\Support\Facades\DB;
class servicerequestcontroller extends Controller
{
    //this function creates a new service request by a user.
    //'id','client_id','serviceprovider_id','location','created_at','updated_at'

    public function createserviceresquest(Request $request){
        $validaterequest= $request->validate([
            'id'=>'required',
            'client_id'=>'required',
            'serviceprovider_id'=>'required',
            'location'=>'required',
            
        ]);

        $createserviceresquest= servicerequest::create([
            'id'=>$validaterequest['id'],
            'client_id'=>$validaterequest['client_id'],
            'serviceprovider_id'=>$validaterequest['serviceprovider_id'],
            'location'=>$validaterequest['location'],
            'created_at'=>now(),
            'update_at'=>now()
        ]);

        $reply = Array();

        if($createserviceresquest){
            $reply['responsetype']="success";
            $reply['message']="A new servicerequest has been added!";
        }else{
            $reply['responsetype']="fail";
            $reply['message']="failed to add new servicerequest!";
        }
        return response()->json($reply);
    }

    //this function is to list all servicerequest
    public function listservicerequest(){
        $listrequest = DB::table('servicerequest')->get();

        
        if($listrequest->isEmpty()){
            $reply = Array();
            $reply['responsetype'] = "fail";
            $reply['message']="Failed to  load servicerequests";

            return response()->json($reply);            
        }
        return response()->json($listrequest);  
    }

    //this function lists service request based on client id.
    public function clientservicerequest($id){
        $listrequest = DB::table('servicerequest')->where('client_id', $id)->get();

        
        if($listrequest->isEmpty()){
            $reply = Array();
            $reply['responsetype'] = "fail";
            $reply['message']="Failed to  load service requests";

            return response()->json($reply);            
        }
        return response()->json($listrequest);  
    }

    //this function deletes service resquest.
    public function deleteservicerequest($id){
        $to_delete_request = DB::table('servicerequest')->where('id', $id)->delete();

        $reply = Array();

        if($to_delete_request){
            $reply['responsetype']="success";
            $reply['message']="Service request of id ("+$id+") has been deleted!";
        }else{
            $reply['responsetype']="fail";
            $reply['message']="failed to delete service request! Try again.";

        }

        return response()->json($reply);
    }
}
