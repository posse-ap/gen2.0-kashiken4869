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
                'name'=>'JavaScript',
                'color'=>'#1754EF',
            ],
            [
                'name'=>'CSS',
                'color'=>'#1071BD',
            ],
            [
                'name'=>'PHP',
                'color'=>'#20BEDE',
            ],
            [
                'name'=>'HTML',
                'color'=>'#3CCEFE',
            ],
            [
                'name'=>'Laravel',
                'color'=>'#B29EF3',
            ],
            [
                'name'=>'SQL',
                'color'=>'#6D46EC',
            ],
            [
                'name'=>'SHELL',
                'color'=>'#4A18EF',
            ],
            [
                'name'=>'情報システム基礎知識(その他)',
                'color'=>'#3105C0',
            ],
        ]
        );
        
    }
}
