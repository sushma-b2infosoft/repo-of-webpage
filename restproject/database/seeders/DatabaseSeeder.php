<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // public function run(): void
    // {
        // User::factory(10)->create();
        //$this->call(PostSeeder::class);

    // Factory se 10 random records
    // \App\Models\Post::factory()->count(10)->create();
    
    //     User::factory()->create([
    //         'name' => 'Test User',
    //         'email' => 'test@example.com',
    //     ]);
    // }
//     $user = \App\Models\User::create([
//         'name' => 'Renu',
//         'email' => 'renu@example.com',
//         'password' => bcrypt('secret')
//     ]);

//     $user->profile()->create([
//         'phone' => '1234567890',
//         'address' => 'Jaipur'
//     ]);
// }
// }
public function run(): void
{
//     $course = \App\Models\Course::create(['title' => 'PHP Basics']);

//     $student = \App\Models\Student::create([
//         'name' => 'Renu',
//         'email' => 'renu@example.com'
//     ]);

//     $student->courses()->attach($course->id);
// }
$user = \App\Models\User::create([
    'name' => 'Renu',
    'email' => 'renu@example.com',
    'password' => bcrypt('password'),
]);
}
}