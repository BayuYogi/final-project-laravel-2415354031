<?php

use App\Http\Controllers\Api\ServiceController; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\SubscriptionController;

Route::group(['as' => 'api.'], function () {
Route::apiResource("services", ServiceController::class); 
Route::patch("services/{service}/activate", [ ServiceController::class, "activate", ]); 
Route::patch("services/{service}/deactivate", [ ServiceController::class, "deactivate", ]); 

Route::apiResource("customers", CustomerController::class); 
Route::patch("customers/{customer}/activate", [CustomerController::class, "activate"]); 
Route::patch("customers/{customer}/deactivate", [CustomerController::class, "deactivate"]);

Route::apiResource("subscriptions", SubscriptionController::class);
Route::patch("subscriptions/{subscription}/status", [SubscriptionController::class, "updateStatus"]);
});