<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudyLanguage;
use Illuminate\Support\Facades\DB;


class GraphController extends Controller
{
    public function languages()
    {
        $languages = StudyLanguage::
        leftJoin('study_data', 'study_data.study_language_id', '=', 'study_languages.id')
        ->select('study_languages.study_language', DB::raw("SUM(study_data.study_hour) as sum") , 'study_languages.color')
        ->groupBy('study_languages.study_language')
        ->groupBy('study_languages.color')
        ->get();
        $languages_data = $languages->values();

        return view('webapp', compact('languages_data'));
    }
}
