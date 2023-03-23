<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyLanguage extends Model
{
    public function languages()
    {
        return $this->hasOne('App\StudyLanguage');
    }

    public function records()
    {
        return $this->hasMany('App\StudyData');
    }

    /**
     * 特定言語の総学習時間を返す
     *
     * @return int
     */
    public function getSumAttribute()
    {
        if (!$this->study_data->isEmpty()) {
            return $this->study_data->reduce(function ($carry, $study_data) {
                return $carry + $study_data->study_hour;
            });
        } else {
            return 0;
        }
    }
}
