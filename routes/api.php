<?php

use Illuminate\Http\Request;
use App\Contact;

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

Route::group(['middleware' => 'api'], function(){
    // Fetch Contacts
    Route::get('contacts', function(){
        return Contact::lastest()->orderBy('created_at', 'desc')->get();
    });

    // Get Single Conatact
    Route::get('conatct/{id}', function(){
        return Conatct::findOrFail($id);
    });

    // Add Contact
    Route::post('contact/store', function(Request $request){
        return Conatct::create(['name' => $request->input(['name']),'email' => $request->input(['email']),'phone' => $request->input(['phone'])]);
    });

    // Update Conatact
    Route::patch('contact/{id}', function(Request $request, $id){
        Contact::findOrFail($id)->update(['name' => $request->input(['name']),'email' => $request->input(['email']),'phone' => $request->input(['phone'])]);
    });

    // Delete Conatct
    Route::delete('contact/{id}', function($id){
        return Contact::destory($id);
    });

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
