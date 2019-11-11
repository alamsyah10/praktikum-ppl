<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserActivities extends Model
{
    protected $table = 'user_activities';

    protected $fillable = [
        'user_id', 'sleep_time', 'breakfast_time', 'lunch_time', 'dinner_time', 'wakeup_time'
    ];

    public function loadUserActivitiesByUserId($userId)
    {
    	return UserActivities::where('user_id', '=', $userId)
    		->latest()
    		->first();
    }
}
