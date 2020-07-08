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


//PertanyaanController == QuestionController
//JawabanController ==AnswerController

Route::get('/pertanyaan', 'QuestionController@index')->name('question.list');
Route::post('/pertanyaan', 'QuestionController@store')->name('question.add');

Route::get('/pertanyaan/create', 'QuestionController@create')->name('question.form');


Route::get('/pertanyaan/{question_id}'        , 'QuestionController@detailQuestion')  ->name('question.detail');
Route::get('/pertanyaan/{question_id}/edit'   , 'QuestionController@edit')            ->name('question.form-edit');
Route::put('/pertanyaan/{question_id}'        , 'QuestionController@update')          ->name('question.edit');
Route::delete('/pertanyaan/{question_id}'     , 'QuestionController@destroy')         ->name('question.delete');




Route::get('/jawaban/{question_id}','AnswerController@index');
Route::post('/jawaban/{question_id}','AnswerController@store')->name('answer.add');
Route::post('/jawaban/{question_id}/comment/{answer_id}','AnswerController@storeComment')->name('answer.comment');


