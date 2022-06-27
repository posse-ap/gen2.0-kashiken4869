<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyLanguage extends Model
{
    public function languages()
    {
        return $this ->hasOne('App\StudyLanguage');
    }
}
