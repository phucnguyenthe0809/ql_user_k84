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
// --------------------LÝ THUYẾT----------------

//Route::Phương thức('đường dẫn','1 function xử lý');

//phương thức
// get (--tất cả những gì trên đường dẫn)
// post (Gửi dữ liệu ngầm);

//Get
Route::get('xin-chao', function () {
    return 'ok';
});

//truyền tham số trên route

Route::get('xin-chao/{name}/kjl/{year?}', function ($name,$year='2019') {
    return $name.' '.$year;
});
Route::get('test', function () {
    //câu lệnh lấy toàn bộ dữ liệu trong bảng Users
    $users=DB::table('users')->get();
    dd($users);
});

//sử dụng model
//lấy toàn bộ dữ liệu trong bảng
Route::get('get-all-data', function () {

    $users=App\Models\Users::all()->toArray();
    dd($users);
});
//Thêm dữ liệu vào databases
Route::get('insert-data', function () {
    $user=new App\Models\Users;
    $user->full="Nguyễn C";
    $user->phone="0356654411";
    $user->address="Thường tín C";
    $user->id_number="2222222";
    $user->save();
    echo 'đã thêm thành công';
    
});

// sửa dữ liệu trong database
Route::get('update-data', function () {
    $user=App\Models\Users::find(51);
    $user->full="Nguyễn B";
    $user->phone="033333333";
    $user->address="Thường tín B";
    $user->id_number="333333333";
    $user->save();
    echo 'đã sửa thành công';
    
});

//xoá 
Route::get('delete-data', function () {
    // xoá theo khoá chính
    App\Models\Users::destroy(52);
});




// --------------------THỰC HÀNH-------------------
//     http://127.0.0.1:8000/  hiển thị chữ 'đây là trang user'
//     http://127.0.0.1:8000/add  hiển thị chữ 'đây là trang add_user'
//     http://127.0.0.1:8000/edit  hiển thị chữ 'đây là trang edit_user'
//http://localhost:8000/
Route::get('/','UserController@getUser' );
Route::get('/add','UserController@getAddUser' );
Route::post('/add','UserController@postAddUser' );
Route::get('/edit/{idUser}','UserController@getEditUser' );
Route::post('/edit/{idUser}','UserController@postEditUser' );
Route::get('/del/{idUser}','UserController@delUser' );

