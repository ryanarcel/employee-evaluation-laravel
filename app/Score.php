<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = 'scores';
    protected $fillable = ['evaluation_id', 'tool_id', 'category_id','item_id', 'score', 'student_id' ];

    public function evaluation(){
        return $this->belongsTo('App\Evaluation');
    }

    public function item(){
        return $this->belongsTo('App\ToolItem','item_id');
    }

    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }
}
