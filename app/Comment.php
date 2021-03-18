<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    public function student(){
        return $this->beloangsTo("App\Student");
    }

    public function getDateFormat()
    {
        return 'Y-m-d H:i:s.u';
    }
}
