<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserActivities;
use App\UserStatistics;
use App\User;
use App\Http\Controllers\HomeController;

class UserController extends Controller
{
	protected function validator(array $data)
    {
        return Validator::make($data, [
            'sleep_time'     => ['required'],
            'breakfast_time' => ['required'],
            'lunch_time'     => ['required'],
            'dinner_time'    => ['required'],
            'wakeup_time'    => ['required'],
        ]);
    }

    public function storeActivities(Request $request)
    {
    	$user = User::getModel()->getUserIdByEmail($request->session()->get('email'));


    	UserActivities::create([
    		'user_id'		 => $user->id,
    		'sleep_time'	 => $request->sleep_time,
    		'breakfast_time' => $request->breakfast_time,
            'lunch_time'     => $request->lunch_time,
            'dinner_time'    => $request->dinner_time,
    		'wakeup_time' 	 => $request->wakeup_time
    	]);


    	return redirect('profile');
    }

    // public function generateUserStatistics($user)
    // {
    //     $UserActivites  = UserActivites::getModel()->loadTodayUserActivitiesByUserId($user->id);
    //     $userStatistics = UserStatistics::getModel()->loadUserStatisticsByUserId($user->id);

    //     foreach ($userStatistics as $key => $userStatistic) {
    //         ''
    //     }
    // }
}
