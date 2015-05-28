<?php

use Illuminate\Database\Seeder;
use App\Models\User;


class PortalTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        User::create([
            'uid'   => 'A2113211001',
            'type'  => 'admin',
            'email' => 'admin@dms.dev',
            'password'  => bcrypt('admin'),
        ]);

        User::create([
            'uid'   => 'M2113211009',
            'type'  => 'student',
            'email' => 'joynal@dms.dev',
            'password'  => bcrypt('student'),
        ]);

        User::create([
            'uid'   => 'T2113211001',
            'type'  => 'faculty',
            'email' => 'faculty@dms.dev',
            'password'  => bcrypt('faculty'),
        ]);
    }

}