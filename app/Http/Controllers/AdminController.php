<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Charts;
use App\User;
use App\Room;
use App\Specialist;

class AdminController extends Controller
{
    // public function dashboard()
    // {
    //     $rooms = Room::all();

    //     $specialists = Specialist::all();

    //     $room = DB::table('rooms')
    //                  ->select(DB::raw('count(*) as room'))
    //                  ->get();

    //     return view('admin.dashboard', array(
    //                 'room' => $room,

    //     ));
    // }

    // public function member()
    // {
    //     $search = request()->input('search');
    //     $users = User::latest()
    //                   ->search($search)
    //                   ->paginate(env('PER_PAGE'));

    //     return view('admin.member', compact('users', 'search'));
    // }

    // public function chartMember()
    // {
    //    $chart = Charts::database(User::all(), 'bar', 'highcharts')
    //         ->colors(['#ff0000', '#00ff00', '#0000ff'])
    //         ->elementLabel("Total")
    //         ->dimensions(700, 400)
    //         ->responsive(false)
    //         ->lastByDay(7, true);

    //     return view('admin.chart_member', ['chart' => $chart]);
    // }

    // public function chartRoom()
    // {
    //     $chart = Charts::database(Room::all(), 'line', 'highcharts')
    //         ->colors(['#ff0000', '#00ff00', '#0000ff'])
    //         ->elementLabel("Total")
    //         ->dimensions(700, 400)
    //         ->responsive(false)
    //         ->lastByDay(7, true);

    //     return view('admin.chart_room', ['chart' => $chart]);
    // }

    // public function destroy(User $user)
    // {
    //     $user->delete();

    //     return view('admin.member')->withDanger('User berhasil dihapus!');
    // }
}
