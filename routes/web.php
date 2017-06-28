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

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {

	return view('about');
});

Route::get('/tasks', function () {

	//Older Way to get records
	//$tasks = DB::table('tasks')->get();

	//New and Eloquent way to get records from database
	$tasks = App\Task::all();

	return view('tasks.index', compact('tasks'));

});

Route::get('/tasks/{task}', function ($id) {

	$task = App\Task::find($id);

	// it prints tasks in JSON format
	//dd($task);

	return view('tasks.show', compact('task'));	

});