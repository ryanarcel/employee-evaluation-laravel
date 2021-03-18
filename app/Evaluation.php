<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table = 'evaluations';

    public function tool(){
        return $this->belongsTo('App\Tool','tool_id');
    }

    public function evaluee(){
        return $this->belongsTo('App\Evaluee', 'evaluee_id');
    }

    public function students(){
        return $this->hasMany("App\Student");
    }

    public function scores(){
        return $this->hasMany('App\Score');
    }

    public function totalscores(){
        return $this->hasMany("App\Total");
    }

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }
}
