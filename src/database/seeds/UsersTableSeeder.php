<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert(
        [
            [
                'role_id' => 1,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$vIztxS465H0EWG695cxPL.xhHKSQjP/thFmxEM9GurDIbdm95anoO',
            ],
            [
                'role_id' => 2,
                'name' => 'user1',
                'email' => 'user1@gmail.com',
                'password' => '$2y$10$vIztxS465H0EWG695cxPL.xhHKSQjP/thFmxEM9GurDIbdm95anoO',
            ],
            [
                'role_id' => 2,
                'name' => 'user2',
                'email' => 'user2@gmail.com',
                'password' => '$2y$10$vIztxS465H0EWG695cxPL.xhHKSQjP/thFmxEM9GurDIbdm95anoO',
            ],
        ]
        );
        
    }
}