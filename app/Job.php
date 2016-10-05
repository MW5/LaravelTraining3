<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ["thumbnail_src", "job_heading", "job_description"];
    public function jobPics() {
        return $this->hasMany('App\JobPic');
    }
}
