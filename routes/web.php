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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk user yang baru register
Route::group(['prefix' => 'home', 'middleware' => ['auth']], function() {
    Route::get('/', function() {
        $data['role'] = \App\UserRole::whereUserId(Auth::id())->get();
        return view('vendor.adminlte.home', $data);
    });

    Route::post('upgrade', function(Request $request) {
        if($request->ajax()){
            $msg['success'] = 'false';
            $user = \App\User::find($request->id);
            if($user)
                $user->putRole($request->level);
                $msg['success'] = 'true';

            return response()
                ->json($msg);
        }
    });
});

// Route untuk user yang admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth','role:admin']], function() {
    Route::get('/', function() {
        $data['users'] = \App\User::whereDoesntHave('roles')->get();

        return view('vendor.adminlte.admin', $data);
    });
});

// Route untuk user yang member
Route::group(['prefix' => 'member', 'middleware' => ['auth','role:member']], function() {
   Route::get('/', function(){
        return view('vendor.adminlte.member');
    });
});

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::get('login/google', 'Auth\LoginController@googleRedirectToProvider')->name('google');
Route::get('login/google/callback', 'Auth\LoginController@googleHandleProviderCallback');

// Route::get('admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
// Route::get('admin/member', 'AdminController@member')->name('admin.member');
// Route::get('admin/chart_member', 'AdminController@chartMember')->name('admin.chart_member');
// Route::get('admin/chart_room', 'AdminController@chartRoom')->name('admin.chart_room');
// Route::delete('admin/member/{user}/delete', 'AdminController@destroy')->name('admin.member.destroy');

Route::get('/member/medichals/{medichal?}', 'MedichalController@index')->name('member.medichals');
Route::post('/member/medichals', 'MedichalController@store')->name('member.medichals.store');
Route::post('/member/medichals/{medichal}', 'MedichalController@update')->name('member.medichals.update');
Route::get('/member/medichals/{medichal}/delete', 'MedichalController@destroy')->name('member.medichals.destroy');

Route::get('/member/rooms/{room?}', 'RoomController@index')->name('member.rooms');
Route::post('/member/rooms', 'RoomController@store')->name('member.rooms.store');
Route::post('/member/rooms/{room}', 'RoomController@update')->name('member.rooms.update');
Route::get('/member/rooms/{room}/delete', 'RoomController@destroy')->name('member.rooms.destroy');