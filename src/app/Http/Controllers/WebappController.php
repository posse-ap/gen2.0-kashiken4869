<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\StudyData;
use App\StudyContent;
use App\StudyLanguage;

class WebappController extends Controller
{
    public function index(Request $request) {

        $user = Auth::user();

        $today = StudyData::whereDate('study_date', date('Y-m-d'))->sum('study_hour');

        $month = StudyData::whereYear('study_date', date('Y'))->whereMonth('study_date', date('m'))->sum('study_hour');

        $total = StudyData::sum('study_hour');

        // 円グラフ（言語）
        $languages = StudyData::leftJoin('study_languages', 'study_data.study_language_id', '=', 'study_languages.id')
                            ->select('study_languages.study_language', DB::raw("SUM(study_data.study_hour) as sum"), 'study_languages.color')
                            ->groupBy('study_languages.study_language', 'study_languages.color')
                            ->get();

        // $languages = StudyLanguage::with('study_data')->get()->groupBy('study_languages.study_language', 'study_languages.color')->first();

        // 円グラフ（内容）
        $contents = StudyData::leftJoin('study_contents', 'study_data.study_content_id', '=', 'study_contents.id')
                            ->select('study_contents.study_content', DB::raw("SUM(study_data.study_hour) as sum"), 'study_contents.color')
                            ->groupBy('study_contents.study_content', 'study_contents.color')
                            ->get();

        // 棒グラフ
        $bars = StudyData::select(DB::raw("SUM(study_hour) as sum"))
                        ->groupBy('study_date')
                        ->havingRaw(" DATE_FORMAT(study_date, '%M/%Y') = DATE_FORMAT(now(), '%M/%Y')")
                        ->get();

        // dd($total);

        return view('webapp', ['total'=> $total, 'month' =>$month, 'today'=> $today, 'languages'=>$languages, 'contents'=>$contents, 'bars'=>$bars, 'user'=>$user] );
    }


    public function languages(Request $request)
    {
        $languages = StudyLanguage::
        leftJoin('study_data', 'study_data.study_language_id', '=', 'study_languages.id')
        ->select('study_languages.study_language', DB::raw("SUM(study_data.study_hour) as sum") , 'study_languages.color')
        ->groupBy('study_languages.study_language')
        ->groupBy('study_languages.color')
        ->get();
        $languages_data = $languages->values();

        dd($languages_data);

        return view('webapp',compact('languages_data'));
    }
    
}
