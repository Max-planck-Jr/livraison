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

//Authentication
Route::get('/login', 'HomeController@login')->name('login');
Route::post('/login', 'HomeController@authLogin')->name('loginAction');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'HomeController@logout')->name('logout');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

    Route::resource("clients", "ClientsController");
    Route::get("colis/withdrawal", "ColisController@withdrawal")->name("colis.withdrawal");
    Route::resource('colis', 'ColisController');
    Route::get("colis/{id}/send", "ColisController@send")->name("colis.send");
    Route::get("colis/{id}/remove", "ColisController@remove")->name("colis.get");
    Route::get("/coliss", "ColisController@tracer")->name("tracer");
    Route::get("/message", "HomeController@message")->name("message");

    Route::resource('tarifs', 'TarifsController');

    Route::resource('conflits', 'IncidentsController');
    Route::get("conflits/{id}/resolve", "IncidentsController@resolve")->name("conflits.resolve");
    Route::get("conflits/{id}/print/letter", "IncidentsController@generateLetter")->name("conflist.generateLetter");
    //Users
    Route::get('/agents', 'AgentController@index')->name('agents');
    Route::get('/agentCreate', 'AgentController@create')->name('newAgent');
    Route::post('/agentStore', 'AgentController@store')->name('storeAgent');
    Route::get('/agentEdit/{id}', 'AgentController@edit')->name('editAgent');
    Route::post('/agentUpdate/{id}', 'AgentController@update')->name('updateAgent');
    Route::post('/agentDestroy/{id}', 'AgentController@destroy')->name('destroyAgent');

    //Suggestions
    Route::get('/sug', 'HomeController@suggestions')->name('suggestions');
    Route::post('/sug/{id}', 'HomeController@changeSuggestionState')->name('changeState');
});

//frontEnd
Route::get('/', 'HomeController@frontEnd')->name('front');
Route::post('/feedback', 'HomeController@feedback')->name('feedback');
