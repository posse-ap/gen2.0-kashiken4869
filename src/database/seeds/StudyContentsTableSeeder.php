<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StudyContentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('study_contents')->insert(
        [
            [
                'study_content'=>'ドットインストール',
                'color'=>'1754EF',
            ],
            [
                'study_content'=>'N予備校',
                'color'=>'1071BD',
            ],
            [
                'study_content'=>'POSSE課題',
                'color'=>'20BEDE',
            ],
        ]
        );
        
    }
}
