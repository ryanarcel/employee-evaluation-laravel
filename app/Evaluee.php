<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluee extends Model
{
    protected $table= 'evaluees';
   // public $timestamps = false;

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }
}
