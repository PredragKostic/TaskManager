<?php

use Illuminate\Database\Seeder;
use App\Time;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Time::class, 2000)->create();
    }
}
