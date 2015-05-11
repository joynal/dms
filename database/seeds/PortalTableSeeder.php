<?php

use Illuminate\Database\Seeder;
use App\Models\User;


class PortalTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        User::create([
            'type'  => 'admin',
            'email' => 'admin@dms.dev',
            'password'  => bcrypt('admin'),
        ]);

        User::create([
            'type'  => 'student',
            'email' => 'joynal@dms.dev',
            'password'  => bcrypt('student'),
        ]);

        User::create([
            'type'  => 'faculty',
            'email' => 'faculty@dms.dev',
            'password'  => bcrypt('faculty'),
        ]);
    }

}