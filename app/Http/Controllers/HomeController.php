<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserActivities;
use App\UserStatistics;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function show()
    {
        return view('dashboard');
    }

    public function profile(Request $request)
    {
        $user = User::getModel()->getUserIdByEmail($request->session()->get('email'));

      //  $userStatistics = UserStatistics::getModel()->loadUserStatisticsByUserId($user->id);
        $currentTime = date('H:i:s');

        return view('profile', [
            'email' => $request->session()->get('email'),
            'current_time' => $currentTime
        ]);
    }

    public function generate(Request $request)
    {
        $currentTime = date('H:i:s');

        return view('profile', [
            'wakeup_time' => $request->wakeup_time,
            'current_time' => $currentTime
        ]);
    }
}
