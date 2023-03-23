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
                'name'=>'ドットインストール',
                'color'=>'#1754EF',
            ],
            [
                'name'=>'N予備校',
                'color'=>'#1071BD',
            ],
            [
                'name'=>'POSSE課題',
                'color'=>'#20BEDE',
            ],
        ]
        );
        
    }
}
