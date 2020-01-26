<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $users = [
            [
                'id' => '1',
                'name' => 'admin',
                'user_type' => 'admin'
            ],
            [
                'id' => '2',
                'name' => 'user 1',
                'user_type' => 'user'
            ],
            [
                'id' => '3',
                'name' => 'user 2',
                'user_type' => 'user'
            ],
        ];
        DB::table('users')->insert($users);
    }
}
