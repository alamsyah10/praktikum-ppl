<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserActivities extends Model
{
    protected $table = 'user_activities';

    public function loadUserActivitiesByUserId($userId)
    {
    	return UserActivities::where('user_id', '=', $userId)
    		->get();
    }
}
