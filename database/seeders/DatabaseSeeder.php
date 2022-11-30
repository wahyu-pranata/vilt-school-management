<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Course;
use App\Models\Group;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Student::factory(25)->create();

         \App\Models\User::factory()->create();
         Group::factory(10)->create();
         Subject::factory(10)
             ->has(Teacher::factory()->count(3))
             ->has(Course::factory()->count(3))
             ->create();
    }
}
