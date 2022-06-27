<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyData extends Model
{

    protected $table = 'study_data';

    public function languages()
    {
    return $this ->hasMany('App\StudyLanguage');
    }

    public function contents()
    {
    return $this ->hasMany('App\StudyContent');
    }
}
