<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\TestController;
use App\Http\Controllers\API\NotificationController;
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


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/me', function(Request $request) {
        return auth()->user();
    });
  
    Route::get('/',[AuthController::class,'index']);
    Route::post('logout',[AuthController::class,'logout']);  
    Route::put('update/{id}',[AuthController::class,'update']); 
    Route::get('getuserbyid/{id}',[AuthController::class,'getUserbyId']); 
    Route::post('notifications',[AuthController::class,'notification']);   
    Route::get('get_devices',[AuthController::class,'get_devices']);
    Route::post('useful_informations',[AuthController::class,'useful_info']); 
    Route::post('reports',[AuthController::class,'view_report']); 
    Route::get('get_user',[AuthController::class,'get_user']); 
    Route::post('faq',[AuthController::class,'faq']); 
    Route::post('tests',[AuthController::class,'tests']); 

    
    //faq routes//
    Route::get('get-user-id/{id}',[AuthController::class,'getUserId']);
    Route::delete('faq-delete/{id}',[FaqController::class,'delete']);
    Route::post('faq-add',[FaqController::class,'add']);
    Route::put('faq-update/{id}',[FaqController::class,'update']);
    Route::get('get-faq-id/{id}',[FaqController::class,'getFaqId']); 
    Route::get('faq-all',[FaqController::class,'faqAll']);
    //test//

    Route::delete('test-delete/{id}',[TestController::class,'delete']);
    Route::post('test-add',[TestController::class,'add']);
    Route::put('test-update/{id}',[TestController::class,'update']);
    Route::get('get-test-id/{id}',[TestController::class,'getTestId']);
    Route::get('test-all',[TestController::class,'testAll']);

    //notification api//
    
    Route::post('start-test',[NotificationController::class,'startTest']); 
    Route::post('ongoing-test',[NotificationController::class,'ongoingTest']); 
    Route::get('ongoing-all-test',[NotificationController::class,'ongoingAllTest']); 
    
});

Route::post('admin-login',[AuthController::class,'adminLogin']);
Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::post('verify-phone-otp',[AuthController::class,'verifyPhoneOtp']);
Route::post('resendpin',[AuthController::class,'resendpin']);
Route::post('forget_password',[AuthController::class,'forget_password']);
Route::post('reset_password',[AuthController::class,'resetpassword']);


//web api routes//


