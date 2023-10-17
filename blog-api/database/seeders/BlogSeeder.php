<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // seeder data
        Blog::create([
                'title' => 'Sample Blog 1',
                'description' => 'This is the description of Sample Blog 1.',
                'category' => 'Laravel',
                'user_id' => 2,
        ]);

        
    }
}