<?php

use Illuminate\Database\Seeder;

class DosensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Dosen::class, 15)->create();
    }
}
