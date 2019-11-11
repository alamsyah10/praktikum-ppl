<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserActivities;
use App\UserStatistics;
use Carbon\Carbon;

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

        $currentTime = Carbon::now();
        $userActivities = UserActivities::getModel()->loadUserActivitiesByUserId($user->id);

        if ($userActivities !== null) {
            if ($currentTime->toDateString() <= $userActivities->created_at->toDateString()) {
                $alreadyFillDailyActivities = true;
            } else {
                $alreadyFillDailyActivities = false;
            }
        } else {
            $alreadyFillDailyActivities = false;
        }
        

        return view('profile', [
            'already_fill_daily_activities' => $alreadyFillDailyActivities,
            'userAct' => $userActivities,
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
