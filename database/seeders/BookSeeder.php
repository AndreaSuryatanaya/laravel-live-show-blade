<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// tambahkan use Illuminate\Support\Facades\DB; untuk menggunakan DB facade
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $book = [
            [
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'year' => 1925,
            ],
            [
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'year' => 1960,
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'year' => 1949,
            ],
        ];

        DB::table('book')->insert($book);
    }
}
