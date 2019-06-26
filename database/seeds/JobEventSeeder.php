<?php

use Illuminate\Database\Seeder;

class JobEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\JobEvent', 20)->create();
    }
}
