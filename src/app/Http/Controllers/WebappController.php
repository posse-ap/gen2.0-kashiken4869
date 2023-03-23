<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use App\StudyData;
use App\StudyLanguage;
use App\StudyContent;

class WebappController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        // 今日の学習時間
        $today = StudyData::where('user_id', $user_id)->whereDate('study_date', date('Y-m-d'))->sum('study_hour');
        // 今月の学習時間
        $month = StudyData::where('user_id', $user_id)->whereYear('study_date', date('Y'))->whereMonth('study_date', date('m'))->sum('study_hour');
        // 合計学習時間
        $total = StudyData::where('user_id', $user_id)->sum('study_hour');

        // 言語円グラフ（グラフで使うデータ）
        $langs = StudyData::leftJoin('study_languages', 'study_data.study_language_id', '=', 'study_languages.id')
            ->select('study_languages.name', DB::raw("SUM(study_data.study_hour) as sum, MIN(study_languages.id)"), 'study_languages.color')
            ->where('user_id', $user_id)
            ->groupBy('study_languages.name', 'study_languages.color')
            ->orderByRaw('MIN(study_languages.id)')
            ->pluck("sum");
        // ->get();
        // dd($langs);
        // 言語円グラフ（ラベル）
        $langs_labels = StudyLanguage::pluck("name");
        // 言語円グラフ（色）
        $langs_colours = StudyLanguage::pluck("color");


        // コンテンツ円グラフ（グラフで使うデータ、ラベル、色の取得）
        $donut_contents = StudyData::leftJoin('study_contents', 'study_data.study_content_id', '=', 'study_contents.id')
            ->select('study_contents.name', DB::raw("SUM(study_data.study_hour) as sum, MIN(study_contents.id)"), 'study_contents.color')
            ->where('user_id', $user_id)
            ->groupBy('study_contents.name', 'study_contents.color')
            ->orderByRaw('MIN(study_contents.id)')
            ->pluck("sum");
        // 言語円グラフ（ラベル）        
        $contents_labels = StudyContent::pluck("name");
        // 言語円グラフ（色）        
        $contents_colours = StudyContent::pluck("color");

        // 棒グラフ
        $bar = StudyData::select(DB::raw("SUM(study_hour) as sum"))
            ->whereYear('study_date', date('Y'))->whereMonth('study_date', date('m'))
            ->where('user_id', $user_id)
            ->groupBy('study_date')
            ->orderBy('study_date')
            ->pluck("sum");
        // 棒グラフ
        $bars = StudyData::select(DB::raw("SUM(study_hour) as sum"))
            ->whereYear('study_date', date('Y'))->whereMonth('study_date', date('m'))
            ->where('user_id', $user_id)
            ->groupBy('study_date')
            ->orderBy('study_date')
            ->havingRaw("DATE_FORMAT(study_date, '%M/%Y') = DATE_FORMAT(now(), '%M/%Y')")
            ->get();

        $all_languages = StudyLanguage::all();
        $languages_on_display = StudyLanguage::where('display', 1)->get();

        $all_contents = StudyContent::all();
        $contents_on_display = StudyContent::where('display', 1)->get();

        // 円グラフ（言語）
        $languages = StudyData::leftJoin('study_languages', 'study_data.study_language_id', '=', 'study_languages.id')
                            ->select('study_languages.name', DB::raw("SUM(study_data.study_hour) as sum"), 'study_languages.color')
                            ->groupBy('study_languages.name', 'study_languages.color')
                            ->get();

        // $languages = StudyLanguage::with('study_data')->get()->groupBy('study_languages.study_language', 'study_languages.color')->first();

        // 円グラフ（内容）
        $contents = StudyData::leftJoin('study_contents', 'study_data.study_content_id', '=', 'study_contents.id')
                            ->select('study_contents.name', DB::raw("SUM(study_data.study_hour) as sum"), 'study_contents.color')
                            ->groupBy('study_contents.name', 'study_contents.color')
                            ->get();


        return view('webapp', compact('today', 'month', 'total', 'languages', 'langs_labels', 'langs_colours', 'contents', 'donut_contents', 'contents_labels', 'contents_colours', 'bars', 'bar', 'langs', 'all_languages', 'all_contents', 'languages_on_display', 'contents_on_display'));
    }

    public function create(Request $request)
    {
        $user_id = Auth::user()->id;

        $request->validate([
            'study_date' => 'required',
            'study_time' => 'required',
        ], [
            'study_date.required' => '学習日',
            'study_time.required'  => '学習時間',
        ]);

        $record = new StudyData();

        $content_array = $request->input('content_value');
        $lang_array = $request->input('lang_value');
        $study_hour = $request->input('study_time');

        if (!empty($content_array) && !empty($lang_array)) {
            // コンテンツと言語を共に複数選択した場合、何に何時間かけたか判断できないためエラーメッセージを返す
            if (count($content_array) > 1 && count($lang_array) > 1) {
                session()->flash('fail', '学習コンテンツと学習言語をともに複数選択することはできません。');
                // コンテンツを複数選択した場合
            } elseif (count($content_array) > 1 && count($lang_array) === 1) {
                foreach ($content_array as $content) {
                    $record->create([
                        'user_id' => $user_id,
                        'study_date' => $request->input('study_date'),
                        'study_hour' => $study_hour / count($content_array),
                        'study_content_id' => $content,
                        'study_language_id' => $lang_array[0],
                    ]);
                }
                session()->flash('success', 'データが正常に追加されました。');

                // 言語を複数選択した場合
            } elseif (count($lang_array) > 1 && count($content_array) === 1) {
                foreach ($lang_array as $lang) {
                    $record->create([
                        'user_id' => $user_id,
                        'study_date' => $request->input('study_date'),
                        'study_hour' => $study_hour / count($lang_array),
                        'study_content_id' => $content_array[0],
                        'study_language_id' => $lang,
                    ]);
                }
                session()->flash('success', 'データが正常に追加されました。');

                // それ以外（どちらも一つずつ選ぶ想定で）
            } else {
                $record->create([
                    'user_id' => $user_id,
                    'study_date' => $request->input('study_date'),
                    'study_hour' => $study_hour / count($lang_array),
                    'study_content_id' => $content_array[0],
                    'study_language_id' => $lang_array[0],
                ]);
                session()->flash('success', 'データが正常に追加されました。');
            }
        } else {
            session()->flash('fail', '学習コンテンツ・学習言語を少なくとも一つ選択してください。');
        }

        return redirect('/top');
    }
}
