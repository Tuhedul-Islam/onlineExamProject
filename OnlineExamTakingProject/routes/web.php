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

//For Default Auth

//Route::get('/', function () {
//    return view('welcome');
//});
//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
//Home
//Route::group(['middleware'=>'auth'],function (){
//    Route::view('/home', 'home')->middleware('auth');
//});

//End For Default Auth

//Route::view('/', 'index');
Route::get('/', 'Auth\LoginController@showStudentLoginForm');

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/student', 'Auth\LoginController@showStudentLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/student', 'Auth\RegisterController@showStudentRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/student', 'Auth\LoginController@studentLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/student', 'Auth\RegisterController@createStudent');

//Admin
Route::group(['middleware'=>'auth:admin'],function (){
    Route::view('/admin', 'admin.index');
    //Admin profile
    Route::get('admin/profile', 'AdminController@index');
    //Exam Title Add
    Route::get('title/index', 'AdminController@titleIndex');
    Route::get('add/title', 'AdminController@addTitle');
    Route::post('title/store', 'AdminController@titleStore');
    Route::get('title-edit/{title_id}', 'AdminController@titleEdit');
    Route::post('title/update/{title_id}', 'AdminController@titleUpdate');
    Route::get('title-delete/{title_id}', 'AdminController@titleDelete');

    //Subject add
    Route::get('subject/index', 'SubjectController@subjectIndex');
    Route::get('add/subject', 'SubjectController@addSubject');
    Route::post('subject/store', 'SubjectController@subjectStore');
    Route::get('subject-edit/{subject_id}', 'SubjectController@subjectEdit');
    Route::post('subject/update/{subject_id}', 'SubjectController@subjectUpdate');
    Route::get('subject-delete/{subject_id}', 'SubjectController@subjectDelete');
//    Route::DELETE('subject-delete/{subject_id}', 'SubjectController@subjectDelete'); for delete method must send [_token:DELETE]

    //QuesSet
    Route::get('quesSet/index', 'QuesSetController@quesSetIndex');
    Route::get('add/quesSet', 'QuesSetController@addQuesSet');
    Route::post('quesSet/store', 'QuesSetController@quesSetStore');
    Route::get('qSet-edit/{set_id}', 'QuesSetController@quesSetEdit');
    Route::post('set/update/{set_id}', 'QuesSetController@quesSetUpdate');
    Route::get('qSet-delete/{set_id}', 'QuesSetController@quesSetDelete');

    //Ques
    Route::get('Ques/index', 'QuesController@quesIndex');
    Route::get('add/question', 'QuesController@addQues');
    Route::post('question/store', 'QuesController@quesStore');
    Route::get('question-delete/{ques_id}', 'QuesController@quesDelete');

    //Notice
    Route::get('notice/index', 'NoticeController@index');
    Route::get('add/notice', 'NoticeController@addNotice');
    Route::post('notice/store', 'NoticeController@noticeStore');
    Route::get('notice-delete/{notice_id}', 'NoticeController@noticeDelete');

    //create Question Set
    Route::get('create/examQuestionSet', 'ExamQuesSetController@index');
    Route::get('create-ques-set/{subject_id}', 'ExamQuesSetController@create');
    Route::post('question-set/store', 'ExamQuesSetController@store');
    Route::get('view/examQuestionSet', 'ExamQuesSetController@viewQues');
    Route::get('view-each-ques-set-subject-wise/{subject_id}', 'ExamQuesSetController@subjectWiseQuesSet');
    Route::get('ques-set-status-change/{ques_id}/{status_id}', 'ExamQuesSetController@changeStatus');
});

//Student
Route::group(['middleware'=>'auth:student'],function (){
    Route::view('/student', 'student');
    Route::get('view-exam/{exam_ques_set_id}', 'ViewQuesSetController@index');
    Route::post('student-ans-paper/store', 'ViewQuesSetController@studentAnswerPaper');




    //Timer Count
    Route::get('view-count/', 'ViewQuesSetController@countView');

});


