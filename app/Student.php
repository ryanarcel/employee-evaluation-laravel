<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    public function evaluation(){
        return $this->belongsTo("App\Evaluation", "evaluation_id");
    }

    public function comment(){
        return $this->hasOne("App\Comment", "student_id");
    }   

    public function scores(){
        return $this->hasMany("App\Score", "student_id");
    }

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }
}
