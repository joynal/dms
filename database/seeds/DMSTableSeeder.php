<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Student;
use App\Models\Faculty;
use App\Models\Level;
use App\Models\Course;
use App\Models\Coffer;
Use App\Models\ClassSchedule;
use App\Models\ExamSchedule;
use App\Models\Semester;
use App\Models\CourseResult;
use App\Models\SemesterResult;
use App\Models\Registration;

class DMSTableSeeder extends Seeder {

    public function run()
    {
        DB::table('registrations')->delete();
        DB::table('coffer_level')->delete();
        DB::table('semester_results')->delete();
        DB::table('course_results')->delete();
        DB::table('exam_schedule_faculty')->delete();
        DB::table('exam_schedules')->delete();
        DB::table('class_schedules')->delete();
        DB::table('coffer_student')->delete();
        DB::table('semesters')->delete();
        DB::table('courses')->delete();
        DB::table('faculties')->delete();
        DB::table('students')->delete();
        DB::table('levels')->delete();
        DB::table('users')->delete();

        User::create([
            'id'         => 1,
            'uid'        => 'F21132111001',
            'type'       => 'student',
            'first_name' => 'Mir',
            'last_name'  => 'Sadnoon',
            'gender'     => 'F',
            'email'      => 'sadnoon@gmail.com',
            'password'   => bcrypt('student'),
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        User::create([
            'id'         => 2,
            'uid'        => 'M21132111002',
            'type'       => 'student',
            'first_name' => 'Sabbir',
            'last_name'  => 'Rahman',
            'gender'     => 'M',
            'email'      => 'sabbir@gmail.com',
            'password'   => bcrypt('student'),
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        User::create([
            'id'         => 3,
            'uid'        => 'M21132111003',
            'type'       => 'student',
            'first_name' => 'Mehedi',
            'last_name'  => 'Hasan',
            'gender'     => 'M',
            'email'      => 'mehedi@gmail.com',
            'password'   => bcrypt('student'),
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        User::create([
            'id'         => 4,
            'uid'        => 'F21132111004',
            'type'       => 'student',
            'first_name' => 'Shika sayed',
            'last_name'  => 'Marzia',
            'gender'     => 'M',
            'email'      => 'marzia@gmail.com',
            'password'   => bcrypt('student'),
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        User::create([
            'id'         => 5,
            'uid'        => 'M21132111009',
            'type'       => 'student',
            'first_name' => 'Joynal',
            'last_name'  => 'Abedin',
            'gender'     => 'M',
            'email'      => 'joynal@gmail.com',
            'password'   => bcrypt('student'),
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        User::create([
            'id'         => 6,
            'uid'        => 'T21132111001',
            'type'       => 'faculty',
            'first_name' => 'Uttam Kumar',
            'last_name'  => 'Dey',
            'gender'     => 'M',
            'email'      => 'uttam@gmail.com',
            'password'   => bcrypt('faculty'),
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        User::create([
            'id'         => 7,
            'uid'        => 'T21132111002',
            'type'       => 'faculty',
            'first_name' => 'Tanzilla',
            'last_name'  => 'Wahid',
            'gender'     => 'F',
            'email'      => 'tangilla@gmail.com',
            'password'   => bcrypt('faculty'),
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        User::create([
            'id'         => 8,
            'type'       => 'admin',
            'email'      => 'admin@dms.dev',
            'password'   => bcrypt('admin'),
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        /**
         * seed level data @levels
         */
        $levels = [
            ['id' => 1, 'batch' => 25, 'section' => null],
            ['id' => 2, 'batch' => 26, 'section' => null],
            ['id' => 3, 'batch' => 27, 'section' => null],
            ['id' => 4, 'batch' => 28, 'section' => null],
            ['id' => 5, 'batch' => 29, 'section' => null],
            ['id' => 6, 'batch' => 30, 'section' => null],
            ['id' => 7, 'batch' => 31, 'section' => null],
            ['id' => 8, 'batch' => 32, 'section' => null],
            ['id' => 9, 'batch' => 33, 'section' => 'A'],
            ['id' => 10, 'batch' => 33, 'section' => 'B'],
            ['id' => 11, 'batch' => 33, 'section' => 'C'],
        ];

        DB::table('levels')->insert($levels);

        Student::create([
            'id'       => 1,
            'batch'    => 25,
            'program'  => 'bsc',
            'level_id' => 1
        ]);

        Student::create([
            'id'       => 2,
            'batch'    => 25,
            'program'  => 'bsc',
            'level_id' => 1
        ]);

        Student::create([
            'id'       => 3,
            'batch'    => 25,
            'program'  => 'bsc',
            'level_id' => 1
        ]);

        Student::create([
            'id'       => 4,
            'batch'    => 25,
            'program'  => 'bsc',
            'level_id' => 1
        ]);

        Student::create([
            'id'       => 5,
            'batch'    => 25,
            'program'  => 'bsc',
            'level_id' => 1
        ]);

        Faculty::create([
            'id' => 6,
            'designation' => 'lecturer',
            'joining_date' => new DateTime
        ]);

        Faculty::create([
            'id' => 7,
            'designation' => 'lecturer',
            'joining_date' => new DateTime
        ]);

        $courses = [
            ['id' => 'CSEC-399', 'name' => 'Project I', 'credit' => 3.00, 'program' => 'bsc'],
            ['id' => 'CSEC-499', 'name' => 'Project II', 'credit' => 3.00, 'program' => 'bsc'],
            ['id' => 'STAT-121', 'name' => 'Statistics & probability', 'credit' => 3.00, 'program' => 'bsc'],
            ['id' => 'CSEC-418', 'name' => 'Machine Learning', 'credit' => 3.00, 'program' => 'bsc'],
            ['id' => 'CSEC-423', 'name' => 'VLSI design & Sessional', 'credit' => 4.50, 'program' => 'bsc'],
            ['id' => 'CSEC-323', 'name' => 'Data Communication', 'credit' => 3.00, 'program' => 'bsc'],
            ['id' => 'CSEC-324', 'name' => 'Measurement & Instrumentation', 'credit' => 3.00, 'program' => 'bsc'],
            ['id' => 'CSEC-414', 'name' => 'Digital Signal Processing', 'credit' => 3.00, 'program' => 'bsc'],
            ['id' => 'CSEC-422', 'name' => 'Internet Programming & Sessional', 'credit' => 4.50, 'program' => 'bsc'],
            ['id' => 'CSEC-221', 'name' => 'Linear Algebra & Fourier Transform', 'credit' => 3.00, 'program' => 'bsc'],
        ];

        DB::table('courses')->insert($courses);
    }

}