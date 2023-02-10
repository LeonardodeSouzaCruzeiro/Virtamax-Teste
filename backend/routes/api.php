<?php

use \App\Http\Controllers\UserController;
use \App\Http\Controllers\ContatoController;
use \App\Http\Controllers\Auth\Api\LoginController;
use \App\Http\Controllers\Auth\Api\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::prefix('auth')->group(function(){
	
	Route::post('login',[LoginController::class ,'login' ]);
	Route::post('logout',[LoginController::class],'logout')->middleware('auth:sanctum');
	Route::post('register',[RegisterController::class ,'register']);

});

Route::prefix('contatos')->group(function(){
	Route::get('/',[ContatoController::class,'index']);
	Route::post('create',[ContatoController::class,'create']);
	Route::get('read/{id}',[ContatoController::class,'read']);
	Route::post('update/{id}',[ContatoController::class,'update']);
	Route::delete('delete/{id}',[ContatoController::class,'delete']);
});

Route::prefix('relatorio')->group(function(){
	Route::get('janeiro',[ContatoController::class,'relatorioJaneiro']);
	Route::get('fevereiro', [ContatoController::class, 'relatorioFevereiro']);
	Route::get('marco',[ContatoController::class,'relatorioMarco']);
	Route::get('abril',[ContatoController::class,'relatorioAbril']);
	Route::get('maio',[ContatoController::class,'relatorioMaio']);
	Route::get('junho',[ContatoController::class,'relatorioJunho']);
	Route::get('julho',[ContatoController::class,'relatorioJulho']);
	Route::get('agosto',[ContatoController::class,'relatorioAgosto']);
	Route::get('setembro',[ContatoController::class,'relatorioSetembro']);
	Route::get('outubro',[ContatoController::class,'relatorioOutubro']);
	Route::get('novembro',[ContatoController::class,'relatorioNovembro']);
	Route::get('dezembro',[ContatoController::class,'relatorioDezembro']);


});


