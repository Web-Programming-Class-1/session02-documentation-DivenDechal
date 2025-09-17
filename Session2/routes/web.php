<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test-submit', function () {
    return view('test-submit');
});

Route::post('submit', function () {
    return 'Form has been submitted';
});

Route::delete('remove', function () {
    return 'send request delete';
});

Route::put('update', function(){
    return 'Post';
});

// 2.2 route setup
   Route::get('/admin/student', function () {
      return "<h1>Daftar Mahasiswa</h1>";
   });

   Route::get('/admin/lecture', function () {
      return "<h1>Daftar Dosen</h1>";
   });

   Route::get('/admin/employee', function () {
      return "<h1>Daftar Karyawan</h1>";
   });  

   Route::prefix('admin')->group(function () {
    Route::get('/student', function () {
        return view('admin.student');
    });

    Route::get('/employee', function () {
        return view('admin.employee');
    });

    Route::get('/lecture', function () {
        return view('admin.lecture');
    });
});

// 2.3

Route::match(['get', 'post'], '/feedback', function (\Illuminate\Http\Request $request) {
    if ($request->isMethod('post')) {
        return 'Form submitted';
    }else if($request->isMethod('post')){
        return 'Form Submitted';
    }
    return view('feedback');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/submit-contact', function (Request $request) {
    $name = $request->input('name');
    return "Received name $name";
});

Route::get('/users', function () {
    return view('users', ['name' => 'Diven', 'age' => 21]);
});

// 2.6
Route::get('/profile/{username}', function ($username) {
    return view('profile', ['name' => $username]);
});

//2.7
// 2.4 Route Fall Back => Fallback route for undefined pages
Route::fallback(function () {
    return response()->view('fallback', [], 404);
});