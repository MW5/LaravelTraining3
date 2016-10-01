<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPic extends Model
{
    public function jobs() {
        return $this->belongsTo('App\Job');
    }
}
