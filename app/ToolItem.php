<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ToolItem extends Model
{
    protected $table= 'tool_items';
    
    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }

    public function Tool(){
        return $this->belongsTo("App/Tool", "tool_id");
    }
}
