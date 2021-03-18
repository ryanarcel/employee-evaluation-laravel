<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluee extends Model
{
    protected $table= 'evaluees';
   

    public function evaluations(){
        return $this->hasMany('App\Evaluation');
    }

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }
}
