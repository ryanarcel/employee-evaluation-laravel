<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ToolItem;

class Tool extends Model
{
    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }

 //  public function $evaluation

    public function items(){
        return $this->hasMany("App\ToolItem");
    }

}
