<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        DB::table('publication_categories')->insert([
//            'name' => 'Type 1'
//        ]);
//        DB::table('photos')->insert([
//                'file' => 'https://cdn.pixabay.com/photo/2014/11/12/19/25/diabetes-528678_1280.jpg'
//        ]);

        for($i = 0; $i < 10; $i++){
            DB::table('publications')->insert([
                'user_id' => 3,
                'publication_category_id' => 1,
                'photo_id' => 3,
                'title' => Str::random(10),
                'body' => Str::random(50),
                'status' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
