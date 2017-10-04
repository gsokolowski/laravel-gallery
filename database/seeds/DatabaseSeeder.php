<?php

use App\Gallery;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // - disable database FOREIGN_KEY_CHECKS
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');


        // Clear db through model
        Gallery::truncate();

        // or through DB
        // DB::table('galleries')->truncate();

        $imageQuantity = 6;

        // use factory to create inserts
        factory(Gallery::class, $imageQuantity)->create(); // create() is to store data in db

    }
}
