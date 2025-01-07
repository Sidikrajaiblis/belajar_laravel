<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            ['title' => 'Tips cepat pintar', 'content' => 'lorem ipsum'],
            ['title' => 'Haruskah menunda belajar?', 'content' => 'lorem ipsum'],
            ['title' => 'Membangun visi misi kesuksesan', 'content' => 'lorem ipsum'],
        ];
        DB::table('posts')->insert($posts);
    }
}
