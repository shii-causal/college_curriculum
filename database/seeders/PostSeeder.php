<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //postsテーブルへデータを追加する
        DB::table('posts')->insert([
                "title" => "命名の心得",
                "body" => "命名はデータを基準に考える",
                "category_id" => 1,
                "created_at" => new DateTime(),
                "updated_at" => new DateTime(),
            ]);
            
        for ($i=1; $i<=15; $i++)
        {
            DB::table('posts')->insert([
                    "title" => "title{$i}",
                    "body" => "This is sample body{$i}.",
                    "category_id" => rand(1, 4),
                    "created_at" => new DateTime(),
                    "updated_at" => new DateTime(),
                ]);
        }
        
    }
}
