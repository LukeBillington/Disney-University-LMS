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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::prefix('admin')->group(function() {
  Route::get('/', 'QuizWizard@index')->name('admin-quiz-index');
  Route::post('/quiz', 'QuizWizard@create')->name('admin-quiz-create');

  Route::get('/quiz/{quiz_id}', 'QuizWizard@view')->name('admin-quiz-view');
  Route::post('/quiz/{quiz_id}', 'QuestionWizard@create')->name('admin-question-create');
  Route::post('/quiz/{quiz_id}/edit', 'QuizWizard@edit')->name('admin-quiz-edit');

  Route::get('/question/{question_id}', 'QuestionWizard@view')->name('admin-question-view');
  Route::post('/question/{question_id}', 'AnswerWizard@create')->name('admin-answer-create');
  Route::post('/question/{question_id}/edit', 'QuestionWizard@edit')->name('admin-question-edit');

  Route::get('/answer/{answer_id}', 'AnswerWizard@view')->name('admin-answer-view');
  Route::post('/answer/{answer_id}/edit', 'AnswerWizard@edit')->name('admin-answer-edit');
});

Route::get('/home', 'TestController@index')->name('portal-index');
Route::get('/test/{quiz_id}', 'TestController@view')->name('test-view');
Route::post('/test/{quiz_id}', 'TestController@grade')->name('test-grade');
