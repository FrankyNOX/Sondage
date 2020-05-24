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

Auth::routes();

Route::get('/home', 'QuestionnaireController@index')->name('home');

Route::get('/questionnaire','QuestionnaireController@create')->name('nouveau_questionnaire');
Route::get('/questionnaire/{id}','QuestionnaireController@show')->name('voir_questionnaire');
Route::get('/questionnaire/editer/{id}','QuestionnaireController@edit')->name('edit_questionnaire');
Route::get('/questionnaire/supprimer/{id}','QuestionnaireController@delete')->name('delete_questionnaire');
Route::get('/questionnaire/stats/{id}','QuestionnaireController@stats')->name('stats_questionnaire');
Route::post('/questionnaire','QuestionnaireController@store')->name('sauv_questionnaire');
Route::post('/questionnaire/{id}','QuestionnaireController@update')->name('update_questionnaire');
Route::get('/questionnaire/repondre/{id}','QuestionnaireController@passer')->name('passer_questionnaire');
Route::post('/questionnaire/repondre/','ReponseController@store')->name('repondre');


Route::post('/question/{id}','QuestionController@store')->name('nouvelle_question');
Route::get('/question/supprimer/{id}','QuestionController@delete')->name('delete_question');


