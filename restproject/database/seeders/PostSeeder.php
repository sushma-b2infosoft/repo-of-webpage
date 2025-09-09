<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'title' => 'My First Post',
            'body' => 'This is test content',
            'published' => true,
            'category' => 'General',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

