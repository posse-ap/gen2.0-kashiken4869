<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyData extends Model
{

    protected $table = 'study_data';

    public function languages()
    {
        return $this->hasMany('App\StudyLanguage');
    }

    public function contents()
    {
        return $this->hasMany('App\StudyContent');
    }

    protected $fillable = [
        'user_id', 'study_date', 'study_language_id', 'study_content_id', 'study_hour',
    ];
}
