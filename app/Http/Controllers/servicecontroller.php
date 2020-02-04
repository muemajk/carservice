<?php

namespace App\Http\Controllers;
use App\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class servicecontroller extends Controller
{
    //this function will create a new service
    public function createservice(Request $request){
        $validateservicerequest = $request->validate([
                'id'=>'required',
                'name'=>'required',
                'type'=>'required',
                'description'=>'required'
        ]);
        $newservice = service::Create([
            'id'=>$validateservicerequest['id'],
            'name'=>$validateservicerequest['name'],
            'type'=>$validateservicerequest['type'],
            'description'=>$validateservicerequest['description'],
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        $reply =  Array();

        if($newservice){
            $reply['responsetype'] = "success";
            $reply['message']="New service created";

        }else{
            $reply['responsetype'] = "fail";
            $reply['message']="Failed to  create new service";
            
        }
        return response()->json($reply);
        
    }

    //this function lists all the services
    public function listservices(){
        $services = DB::table('service')->get();
        if($services->isEmpty()){
            $reply =  Array();
            $reply['responsetype'] = "fail";
            $reply['message']="Failed to  load service";
            
            return response()->json($reply);
        }

        return response()->json($services);
    }

    //this function deletes a service based ona given id.
public function deleteservice($id){
    $to_delete_service=DB::table('service')->where('id',$id)->delete();

    $reply = Array();

    if($to_delete_service){
        $reply['responsetype']="success";
        $reply['message']="Service of id ("+$id+") has been deleted!";
    }else{
        $reply['responsetype']="fail";
        $reply['message']="failed to delete service!";

    }

    return response()->json($reply);
}
}
