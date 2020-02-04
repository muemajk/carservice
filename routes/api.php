<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//routes for  services
Route::get('services',"servicecontroller@listservices");
Route::post('servies/create',"servicecontroller@createservice");
Route::post('services/delete/{id}',"servicecontroller@deleteservice");

//routes for clients.
Route::get('clients/',"clientcontroller@allclients");
Route::post('client/{id}',"clientcontroller@client");
Route::post('clients/delete/{id}',"clientcontroller@deleteclient");
Route::post('clients/create',"clientcontroller@create");

//routes for vendors.
Route::get('vendors/',"vendorcontroller@allvendors");
Route::post('vendor/{id}',"vendorcontroller@vendor");
Route::post('vendors/delete/{id}',"vendorcontroller@deletevendor");
Route::post('vendors/create',"vendorcontroller@create");

//routes for service request.
Route::get('requests/',"servicerequestcontroller@listservicerequest");
Route::post('requests/create',"servicerequestcontroller@createserviceresquest");
Route::get('requests/{id}',"servicerequestcontroller@clientservicerequest");
Route::post('requests/delete/{id}',"servicerequestcontroller@deleteservicerequest");

//routes for service providers.
Route::get('providers/',"serviceprovidercontroller@listproviders");
Route::post('providers/create',"serviceprovidercontroller@createserviceprovider");
Route::get('providers/delete/{id}',"serviceprovidercontroller@deleteserviceprovider");
Route::get('providers/{id}',"serviceprovidercontroller@serviceprovider");

//routes for transactions.
Route::get('transactions/',"transactionscontroller@listtransactions");
Route::post('transaction/create',"transactionscontroller@createtransaction");

//routes for adminstrator actions.
Route::get('admins/',"admincontroller@alladmins");
Route::post('admin/{id}',"admincontroller@admin");
Route::post('admins/delete/{id}',"admincontroller@deleteadmin");
Route::post('admins/create',"admincontroller@create");
