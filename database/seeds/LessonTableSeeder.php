<?php

use App\Lesson;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($i=0; $i<20; $i++)
        {

        	  DB::table('lessons')->insert([
            'title' => str_random(10),
            'body' => str_random(10),
            'some_bool' => rand(0,1)
        ]);

        }
    }
}
