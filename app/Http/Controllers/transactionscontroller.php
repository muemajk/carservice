<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transactions;
use Illuminate\Support\Facades\DB;
class transactionscontroller extends Controller
{
    //THIS FUNCTION CREATE A NEW TRANSACTION.
    //'id','service_request_id',
    public function createtransaction(Request $request){
        $validatetransaction=$request->validate([
            'id'=>'required',
            'service_request_id'=>'required'
        ]);
        $newtransaction=transactions::create([
            'id'=>$validatetransaction['id'],
            'service_request_id'=>$validatetransaction['service_request_id'],
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        $reply = Array();

        if($newtransaction){
            $reply['responsetype']="success";
            $reply['message']="A new transaction has been set!";
        }else{
            $reply['responsetype']="fail";
            $reply['message']="failed to set new transaction!";
        }

        return response()->json($reply);        
    }

    //this function will list all transactions.
    public function listtransactions(){
        $listtransactions = DB::table('transaction')->get();
        if($listtransactions->isEmpty()){
            $reply = Array();
            $reply['responsetype'] = "fail";
            $reply['message']="Failed to  load transactions";

            return response()->json($reply);            
        }
        return response()->json($listtransactions);         
    }
}
