<?php

use Illuminate\Support\Facades\Route;

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
    return view('pages.question-detail');
});



Route::get('/pertanyaan', 'QuestionController@index');
Route::post('/pertanyaan', 'QuestionController@store')->name('question.add');

Route::get('/pertanyaan/create', 'QuestionController@create');


Route::get('/pertanyaan/{id}', 'QuestionController@detailQuestion')->name('question.detail');

Route::get('/jawaban/{pertanyaan_id}','AnswerController@index');
Route::post('/jawaban/{pertanyaan_id}','AnswerController@store')->name('answer.add');

