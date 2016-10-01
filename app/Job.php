<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function jobPics() {
        return $this->hasMany('App\JobPic');
    }
}
