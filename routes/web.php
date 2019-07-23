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

Route::get('/', 'newsController@newslist');
Route::get('/kategori/{kategori}', 'newsController@newscat');
Route::post('/pendaftaran/submit', 'Auth\RegisterController@usersubmit');
Route::post('/editprofile/submit', 'usercontroller@editprofile');
Route::post('/editprofile/ubahpassword/submit', 'usercontroller@ubahpassword');
Route::get('/pendaftaran', 'Auth\RegisterController@pendaftaran');
Route::get('/editprofile', 'authcontroller@editprofileuser');
Route::get('/editprofile/ubahpassword', 'authcontroller@ubahpassworduser');
Route::get('/login', 'authcontroller@loginsession');
Route::post('/login/submit', 'authcontroller@store');
Route::get('/userlogin', 'authcontroller@userloginsession');
Route::post('/userlogin/submit', 'authcontroller@userstore');
Route::get('hardware/soc','hardwarecontroller@listsoc');
Route::get('hardware/cpu','hardwarecontroller@listcpu');
Route::get('hardware/gpu','hardwarecontroller@listgpu');
Route::get('/about', 'newsController@about');
Route::get('/addadmin','authcontroller@adminregister');
Route::post('/addadmin/submit','authcontroller@adminsubmit');
Route::get('/superadminpage', 'authcontroller@superadminpage');
Route::get('/superadminpage/hw', 'authcontroller@superadminhw');
Route::get('/superadminpage/news', 'authcontroller@superadminnews');
Route::get('verify', 'Auth\RegisterController@verify')->name('signup.verify');
Route::get('/news/{id}', 'newsController@detail');
Route::get('hardware/soc/{id}','hardwarecontroller@detailhw');
Route::post('hardware/soc/review/submit','hardwarecontroller@reviewsoc');
Route::get('hardware/cpu/{id}','hardwarecontroller@detailcpu');
Route::post('hardware/cpu/review/submit','hardwarecontroller@reviewcpu');
Route::get('hardware/gpu/{id}','hardwarecontroller@detailgpu');
Route::post('hardware/gpu/review/submit','hardwarecontroller@reviewgpu');
Route::get('/post', 'authcontroller@authpost');
Route::get('/postsoc', 'authcontroller@addsoc');
Route::get('/postcpu', 'authcontroller@addcpu');
Route::post('/postcpu/submit', 'hardwarecontroller@addcpu');
Route::get('/postgpu', 'authcontroller@addgpu');
Route::post('/postgpu/submit', 'hardwarecontroller@addgpu');
Route::get('/dashboardsoc','hardwarecontroller@soclist');
Route::get('/dashboardcpu','hardwarecontroller@cpulist');
Route::get('/dashboardgpu','hardwarecontroller@gpulist');
Route::get('/userreview','hardwarecontroller@reviewlist');
Route::post('/postsoc/submit', 'hardwarecontroller@addsoc');
Route::post('/post/submit', 'newsController@posting');
Route::post('/comment/submit', 'newsController@komentar');
Route::get('/komentarulasadmin', 'newsController@ulaskomen');
Route::post('/komentarulasadmin/delete','newsController@deletecomment');
Route::post('/komentarulasadmin/approve','newsController@approval');
Route::post('/komentarulasadmin/disapprove','newsController@disapproval');
Route::delete('/deletesoc/{id}','hardwarecontroller@deletesoc');
Route::delete('/deletecpu/{id}','hardwarecontroller@deletecpu');
Route::delete('/deletegpu/{id}','hardwarecontroller@deletegpu');
Route::delete('/deletereview/{id}','hardwarecontroller@deletereview');
Route::get('/search','newsController@searching');
Route::get('/logout','authcontroller@logout');
Route::get('/logoutuser','authcontroller@logoutuser');
Route::get('/dashboard','authcontroller@dashboard');
Route::get('/editpost/{id}','authcontroller@editpost');
Route::get('/editsoc/{id}','hardwarecontroller@editsoc');
Route::post('/editsoc/submit','hardwarecontroller@updatesoc');
Route::get('/editcpu/{id}','hardwarecontroller@editcpu');
Route::post('/editcpu/submit','hardwarecontroller@updatecpu');
Route::get('/editgpu/{id}','hardwarecontroller@editgpu');
Route::post('/editgpu/submit','hardwarecontroller@updategpu');
Route::post('/editpost/update','authcontroller@update');
Route::get('/dashboard/deleteconfirmation/{id}','authcontroller@deleteconf');
Route::get('/adminpage', 'authcontroller@authadmin');
Route::post('/dashboard/deleteconfirmation/delete/{id}','authcontroller@delete');
