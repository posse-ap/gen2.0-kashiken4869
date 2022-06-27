<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\StudyData;
use App\StudyLanguage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $today = StudyData::whereDate('study_date', date('Y-m-d'))->sum('study_hour');

        // $month = StudyData::whereYear('study_date', date('Y'))->whereMonth('study_date', date('m'))->sum('study_hour');

        // $total = StudyData::sum('study_hour');
        //         $param = ['today' => $today, 'month' => $month, 
        //             'total' => $total,];
        return view('home', );
    }


}
