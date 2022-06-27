<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StudyLanguagesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('study_languages')->insert(
        [
            [
                'study_language'=>'JavaScript',
                'color'=>'1754EF',
            ],
            [
                'study_language'=>'CSS',
                'color'=>'1071BD',
            ],
            [
                'study_language'=>'PHP',
                'color'=>'20BEDE',
            ],
            [
                'study_language'=>'HTML',
                'color'=>'3CCEFE',
            ],
            [
                'study_language'=>'Laravel',
                'color'=>'B29EF3',
            ],
            [
                'study_language'=>'SQL',
                'color'=>'6D46EC',
            ],
            [
                'study_language'=>'SHELL',
                'color'=>'4A18EF',
            ],
            [
                'study_language'=>'情報システム基礎知識(その他)',
                'color'=>'3105C0',
            ],
        ]
        );
        
    }
}
