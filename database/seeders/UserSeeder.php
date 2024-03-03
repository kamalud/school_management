<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('admin@gmail.com'),
            'user_type'=>1,
        ]);
        User::create([
            'name'=>'school',
            'email'=>'school@gmail.com',
            'password'=>bcrypt('school@gmail.com'),
            'user_type'=>2,
        ]);
        User::create([
            'name'=>'teacher',
            'email'=>'teacher@gmail.com',
            'password'=>bcrypt('teacher@gmail.com'),
            'user_type'=>3,
        ]);
        User::create([
            'name'=>'parent',
            'email'=>'parent@gmail.com',
            'password'=>bcrypt('parent@gmail.com'),
            'user_type'=>4,
        ]);
        User::create([
            'name'=>'student',
            'email'=>'student@gmail.com',
            'password'=>bcrypt('student@gmail.com'),
            'user_type'=>5,
        ]);
    }
}
