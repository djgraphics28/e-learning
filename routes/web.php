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

Auth::routes();

Route::get('/', function () {
    if (\Auth::check()){
        if (\Auth::user()->user_id != 2)
            return view('admin.browse.index');
        else
            return view('index');
    }
    return view('index');
});

Route::get('/browse', 'BrowseController@index');
Route::get('/browse/{id}', 'BrowseController@view');
Route::get('/browse-country/{country}', 'BrowseController@view_country');

Route::get('/quiz', 'QuizController@index');
Route::get('/quiz/take/{id}', 'QuizController@take');
Route::post('/quiz/take/submit', 'QuizController@takeSubmit');

// COUNTRY
Route::get('/admin/country', 'AdminCountryController@index');
Route::get('/admin/country/table', 'AdminCountryController@table');
Route::get('/admin/country/add', 'AdminCountryController@add');
Route::post('/admin/country/add/save', 'AdminCountryController@addSave');
Route::get('/admin/country/update/{id}', 'AdminCountryController@update');
Route::post('/admin/country/update/save', 'AdminCountryController@updateSave');
Route::post('/admin/country/remove/{id}', 'AdminCountryController@remove');


// BROWSE
Route::get('/admin/browse', 'AdminBrowseController@index');
Route::get('/admin/browse/table', 'AdminBrowseController@table');
Route::get('/admin/browse/add', 'AdminBrowseController@add');
Route::post('/admin/browse/add/save', 'AdminBrowseController@addSave');
Route::get('/admin/browse/update/{id}', 'AdminBrowseController@update');
Route::post('/admin/browse/update/save', 'AdminBrowseController@updateSave');
Route::post('/admin/browse/remove/{id}', 'AdminBrowseController@remove');

// QUIZ
Route::get('/admin/quiz', 'AdminQuizController@index');
Route::get('/admin/quiz/table', 'AdminQuizController@table');
Route::get('/admin/quiz/add', 'AdminQuizController@add');
Route::post('/admin/quiz/add/save', 'AdminQuizController@addSave');
Route::get('/admin/quiz/view/{id}', 'AdminQuizController@view');
Route::get('/admin/quiz/update/{id}', 'AdminQuizController@update');
Route::post('/admin/quiz/update/save', 'AdminQuizController@updateSave');
Route::post('/admin/quiz/remove/{id}', 'AdminQuizController@remove');
Route::get('/admin/quiz/logs/{id}', 'AdminQuizController@logs');
Route::get('/admin/quiz/logs/table/{id}', 'AdminQuizController@logsTable');

// STUDENT
Route::get('/admin/student', 'AdminStudentController@index');
Route::get('/admin/student/table', 'AdminStudentController@table');
Route::get('/admin/student/add', 'AdminStudentController@add');
Route::post('/admin/student/add/save', 'AdminStudentController@addSave');
Route::get('/admin/student/update/{id}', 'AdminStudentController@update');
Route::post('/admin/student/update/save', 'AdminStudentController@updateSave');
Route::post('/admin/student/remove/{id}', 'AdminStudentController@remove');
Route::get('/admin/student/bin/', 'AdminStudentController@bin');
Route::get('/admin/student/bin/table', 'AdminStudentController@binTable');
Route::post('/admin/student/restore/{id}', 'AdminStudentController@restore');

// TEACHER
Route::get('/admin/teacher', 'AdminTeacherController@index');
Route::get('/admin/teacher/table', 'AdminTeacherController@table');
Route::get('/admin/teacher/add', 'AdminTeacherController@add');
Route::post('/admin/teacher/add/save', 'AdminTeacherController@addSave');
Route::get('/admin/teacher/update/{id}', 'AdminTeacherController@update');
Route::post('/admin/teacher/update/save', 'AdminTeacherController@updateSave');
Route::post('/admin/teacher/remove/{id}', 'AdminTeacherController@remove');
Route::get('/admin/teacher/bin/', 'AdminTeacherController@bin');
Route::get('/admin/teacher/bin/table', 'AdminTeacherController@binTable');
Route::post('/admin/teacher/restore/{id}', 'AdminTeacherController@restore');

Route::get('/admin/profile', 'AdminTeacherController@profile');
