<?php

namespace App\Http\Controllers;
use App\serviceprovider;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class serviceprovidercontroller extends Controller
{
    //this function creates a new serviceprovider
    public function createserviceprovider(Request $request){
            //'id','service_id','vendor_id','details','location','Rating','created_at','updated_at'
            $validateprovider = $request->validate([
                'id'=>'required',
                'service_id'=>'required',
                'vendor_id'=>'required',
                'details'=>'required',
                'location'=>'required',
                'Rating'=>'required'
            ]);

            $newprovider= serviceprovider::create([
                'id'=>$validateprovider['id'],
                'service_id'=>$validateprovider['service_id'],
                'vendor_id'=>$validateprovider['vendor_id'],
                'details'=>$validateprovider['details'],
                'location'=>$validateprovider['location'],
                'Rating'=>$validateprovider['Rating'],
                'created_at'=>now(),
                'updated_at'=>now()
            ]);

            $reply = Array();

            if($newprovider){
                $reply['responsetype']="success";
                $reply['message']="A new serviceprovider has been created!";
            }else{
                $reply['responsetype']="fail";
                $reply['message']="failed to create new serviceprovider!";
            }

            return response()->json($reply);
    }
    //this function list all serviceproviders
    public function listproviders(){
        $listproviders = DB::table('serviceprovider')->get();

        
        if($listproviders->isEmpty()){
            $reply = Array();
            $reply['responsetype'] = "fail";
            $reply['message']="Failed to  load serviceproviders";

            return response()->json($reply);            
        }
        return response()->json($listproviders);    
    }

    //this function will display details of one serviceprovider.
    public function serviceprovider($id){
        $provider = DB::table('serviceprovider')->where('vendor_id', $id)->get();

        
        if($provider->isEmpty()){
            $reply = Array();
            $reply['responsetype'] = "fail";
            $reply['message']="Failed to  load service provider";

            return response()->json($reply);            
        }
        return response()->json($provider);         
    }

    //this function deletes a serviceprovider based ona given id.
    public function deleteserviceprovider($id){
        $to_delete_serviceprovider=DB::table('serviceprovider')->where('id', '==',$id)->delete();

        $reply = Array();

        if($to_delete_serviceprovider){
            $reply['responsetype']="success";
            $reply['message']="Serviceprovider of id ("+$id+") has been deleted!";
        }else{
            $reply['responsetype']="fail";
            $reply['message']="failed to delete serviceprovider!";

        }

        return response()->json($reply);
    }
}
