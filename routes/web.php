<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/',function(){
        return redirect('/tasks');
    })->name('home');
    Route::resource('tasks', 'TaskController');
    Route::get('/week/create',function(){
        return view('tasks.week.create');
    })->name('tasks.week.create');
//    Route::post( '/create/event' ,'TaskController@test')->name('create_event');
    Route::post('/create/week','TaskController@week')->name('create_week');
    Route::post('termPeriod/create','TermPeriodController@store')->name('termPeriod.create');
    Route::get('termPeriod/index',function(){
        return view('tasks.period.create');
    })->name('tasks.period.index');
    Route::get('/tasks/delete/{id}','TaskController@destroy')->name('tasks.delete');
    Route::get('/home', 'HomeController@index')->name('home');
});
Auth::routes();

