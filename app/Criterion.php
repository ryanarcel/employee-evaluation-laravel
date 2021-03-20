<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criterion extends Model
{
    protected $table = "criteria";
    protected $fillable = ["tool_id", "item_id", "criterion", "points"];
    public $timestamps = false;

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }

}
