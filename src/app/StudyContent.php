<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyContent extends Model
{
    public function languages()
    {
        return $this->hasOne('App\StudyLanguage');
    }

    public function records()
    {
        return $this->hasMany('App\Studydata');
    }

    /**
     * 特定コンテンツの総学習時間を返す
     *
     * @return int
     */
    public function getSumAttribute()
    {
        return $this->study_data->reduce(function ($carry, $study_data) {
            return $carry + $study_data->study_hour;
        });
    }
}
