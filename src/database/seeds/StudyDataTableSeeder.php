<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudyDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('study_data')->insert(
            [
                [
                    'study_date'=>'2022-5-15',
                    'study_language_id'=>1,
                    'study_content_id'=>1,
                    'study_hour'=>1,
                ],
                [
                    'study_date'=>'2022-6-16',
                    'study_language_id'=>3,
                    'study_content_id'=>2,
                    'study_hour'=>1,
                ],
                [
                    'study_date'=>'2022-6-17',
                    'study_language_id'=>4,
                    'study_content_id'=>2,
                    'study_hour'=>1,
                ],
                [
                    'study_date'=>'2022-6-18',
                    'study_language_id'=>4,
                    'study_content_id'=>1,
                    'study_hour'=>1,
                ],
                [
                    'study_date'=>'2022-6-19',
                    'study_language_id'=>5,
                    'study_content_id'=>1,
                    'study_hour'=>1,
                ],
                [
                    'study_date'=>'2022-6-20',
                    'study_language_id'=>1,
                    'study_content_id'=>3,
                    'study_hour'=>1,
                ],
                [
                    'study_date'=>'2022-6-22',
                    'study_language_id'=>1,
                    'study_content_id'=>1,
                    'study_hour'=>1,
                ],
                [
                    'study_date'=>'2022-6-23',
                    'study_language_id'=>1,
                    'study_content_id'=>1,
                    'study_hour'=>1,
                ],
                [
                    'study_date'=>'2022-6-26',
                    'study_language_id'=>1,
                    'study_content_id'=>1,
                    'study_hour'=>1,
                ],
                [
                    'study_date'=>'2022-6-27',
                    'study_language_id'=>5,
                    'study_content_id'=>3,
                    'study_hour'=>10,
                ],
            ]
        );
    }
}
