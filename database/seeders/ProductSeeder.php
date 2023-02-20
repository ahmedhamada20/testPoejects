<?php

namespace Database\Seeders;

use App\Models\PDF;
use App\Models\Photo;
use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Schema::disableForeignKeyConstraints();
        DB::table('products')->truncate();

        for ($i = 1; $i <= 15 ; $i++) {
            $new = new Product();
            $new->name = ['ar' => $faker->name, 'en' => $faker->name];
            $new->notes = ['ar' => $faker->name, 'en' => $faker->name];
            $new->status = false;
            $new->price = $faker->numberBetween(100,20000);
            $new->url = $faker->url();
            $new->save();
        }

        for ($i = 1; $i <= 25 ; $i++) {
            Photo::insert([
                'Filename'     => rand(1,6) . ".png",
                'photoable_id' => rand(1,6),
                'photoable_type' => 'App\Models\Product'
            ]);
        }

        for ($i = 1; $i <= 6 ; $i++) {
            PDF::insert([
                'Filename'     =>"1658152893_HR_.pdf",
                'pdfable_id' => rand(1,6),
                'pdfable_type' => 'App\Models\Product'
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
