<?php

/*
|-------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/test', function () {
    $pword = "test";
    $hashed = Hash::make($pword);
    echo $hashed;

    echo "<br>";
    echo "session: ".session('key');

})->name("test");

Route::get('/dash', function () {
    return view('defaultdashboard');
})->name('dash');


Route::get('/', function () {
    if(Auth::check()){
        return redirect()->route('admindashboard');
    }
    if(session('account')){
        return redirect()->route('teacher-landing');
    }
    return view('layouts.front');
})->name('front');


// logins
Route::post('postLogin/HR', 'LoginController@authenticatehr')->name('authenticatehr');
Route::post('postLogin/teacher', 'LoginController@authTeacher')->name('authTeacher');
//logout
Route::get('logout', 'LoginController@logout')->name('logout');

Route::group(['middleware' => ['customAuthAdmin']], function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admindashboard');

    // ================= evaluation 
    Route::get('/evaluation/select', function () {
        return view('admin.pick-evaluation');
    })->name('select-evaluation');

    //==================Evaluation Tool ===================
    Route::get('/tools/select', 'ToolController@getTools')->name('pick-tool');
    Route::get('/tools/{id}', 'ToolController@getItems')->name('showTool');
    Route::post('/storeItem', 'ToolController@storeItem')->name("storeItem");
    Route::post('/storeCategory/{id}', 'ToolController@storeCategory')->name("storeCategory");
    Route::post('/storeCategoryItem/{id}', 'ToolController@storeCategoryItem')->name("storeCategoryItem");
    Route::post('/updateItem/{id}', 'ToolController@updateItem')->name("updateItem");
    Route::get('/deleteItem/{id}', 'ToolController@deleteItem')->name("deleteItem");

    //=================Resource Controllers===============//

    Route::resource('admins', 'AdminController');
    Route::resource('supervisors', 'SupervisorController');
    Route::resource('evaluees', 'EvalueeController');
    Route::resource('BEDevaluees', 'BedController');
    Route::resource('NTPevaluees', 'NTPController');

    Route::resource('teacherTools', 'ToolItemController');
    Route::resource('evaluations', 'EvaluationController');
    Route::post('/fetchEvaluations','EvaluationController@fetch')->name('fetchTeacher');
    Route::resource('adminevaluations', 'AdminEvaluationController');
    Route::resource('supervevaluations', 'SupervEvaluationController');
    Route::resource('ntpevaluations', 'NTPEvaluationController');

    Route::get('/evaluee/new', function(){
        $passwordData = DB::table("defaultpass")->first();
        $password = $passwordData->password;
        $newEvaluee = DB::table('evaluees')->orderBy('id', 'desc')->first();
        return view('views-evaluee.newly')->with(["newEvaluee"=>$newEvaluee, "password"=>$password]);
    })->name("newEvaluee");

    Route::get('openClose/{id}/{status}/{origin}', 'EvaluationController@openClose')->name('openClose');
    Route::get('accessNot/{id}/{access}/{origin}', 'EvaluationController@accessNot')->name('accessNot');
    Route::get('archival/{id}/', 'EvaluationController@archival')->name('archival');
    Route::get('evaluation/print/{id}/', 'EvaluationController@print')->name('print');
    Route::post('evaluee/{id}/summarize/', 'EvalueeController@summarize')->name('summarize');
    Route::get('evaluee/{id}/print-summary', 'EvalueeController@printSummary')->name('printSummary');

    Route::get('adminOpenClose/{id}/{status}/{origin}', 'AdminEvaluationController@openClose')->name('adminOpenClose');
    Route::get('supervOpenClose/{id}/{status}/{origin}', 'SupervEvaluationController@openClose')->name('supervOpenClose');
});


//============== teacher's page =======//

Route::group(['middleware' => ['customAuthTeacher']], function () {
    Route::get("teacher/landingpage", function(){
        return view('views-teacher.landingpage');
    })->name('teacher-landing');

});

//================students' page===============//
Route::get('/evaluator/access-key/', function(){
    return view('views-student.access-key');
})->name('access-key');
Route::post('evaluator/page/', 'RatingsController@access')->name('access-page');

//Route::group(['middleware' => ['customAuthStudent']], function () {
    //subject for middleware

    Route::post('student/page/submit', 'RatingsController@submit')->name('submit-scores');
    Route::post('student/page/submit-admin/', 'RatingsController@submitAdmin')->name('submit-scoresAdmin');
    Route::post('student/page/submit-total', 'RatingsController@submitTotal')->name('submit-totalscores');
    
    Route::get('student/key/not-found', function(){
        return view('views-student.not-found');
    })->name('keyNotFound');
    Route::get('student/success', function(){
        return view('views-student.success');
    })->name('success-eval');

    

//});

