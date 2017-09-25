<?php

Route::get('/', ['as' => 'index', 'uses' => 'SiteController@index']);
Route::get('medicos', ['as' => 'doctors', 'uses' => 'SiteController@doctors']);
Route::get('pacientes', ['as' => 'patients', 'uses' => 'SiteController@patients']);
Route::get('agendamentos', ['as' => 'schedulings', 'uses' => 'SiteController@schedulings']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function()
{
  Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);      
  
  Route::group(['as' => 'doctor.', 'prefix' => 'medico'], function(){
    Route::get('', ['as' => 'index', 'uses' => 'DoctorController@index']);
    Route::get('cadastrar', ['as' => 'create', 'uses' => 'DoctorController@create']);
    Route::post('cadastrar', ['as' => 'store', 'uses' => 'DoctorController@store']);
    Route::get('editar/{id}', ['as' => 'edit', 'uses' => 'DoctorController@edit']);
    Route::post('editar/{id}', ['as' => 'update', 'uses' => 'DoctorController@update']);
    Route::get('deletar/{id}', ['as' => 'delete', 'uses' => 'DoctorController@delete']);
    Route::post('deletar/{id}', ['as' => 'destroy', 'uses' => 'DoctorController@destroy']);
  });

  Route::group(['as' => 'patient.', 'prefix' => 'paciente'], function(){
    Route::get('', ['as' => 'index', 'uses' => 'PatientController@index']);
    Route::get('cadastrar', ['as' => 'create', 'uses' => 'PatientController@create']);
    Route::post('cadastrar', ['as' => 'store', 'uses' => 'PatientController@store']);
    Route::get('editar/{id}', ['as' => 'edit', 'uses' => 'PatientController@edit']);
    Route::post('editar/{id}', ['as' => 'update', 'uses' => 'PatientController@update']);
    Route::get('deletar/{id}', ['as' => 'delete', 'uses' => 'PatientController@delete']);
    Route::post('deletar/{id}', ['as' => 'destroy', 'uses' => 'PatientController@destroy']);
  });

  Route::group(['as' => 'scheduling.', 'prefix' => 'agendamento'], function(){
	  Route::get('', ['as' => 'index', 'uses' => 'SchedulingController@index']);
	  Route::get('cadastrar', ['as' => 'create', 'uses' => 'SchedulingController@create']);
	  Route::post('cadastrar', ['as' => 'store', 'uses' => 'SchedulingController@store']);
	  Route::get('editar/{id}', ['as' => 'edit', 'uses' => 'SchedulingController@edit']);
	  Route::post('editar/{id}', ['as' => 'update', 'uses' => 'SchedulingController@update']);
	  Route::get('deletar/{id}', ['as' => 'delete', 'uses' => 'SchedulingController@delete']);
	  Route::post('deletar/{id}', ['as' => 'destroy', 'uses' => 'SchedulingController@destroy']);
  });

});


