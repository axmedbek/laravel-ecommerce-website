<?php

use Illuminate\Database\Seeder;
use App\ProductDetail;

use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Product::truncate();
        ProductDetail::truncate();


        for ($i = 0 ; $i<30 ; $i++){
            $product_name = $faker->sentence(2);
            $product = Product::create([
                'product_name' => $product_name,
                'slug' => str_slug($product_name),
                'description' => $faker->sentence(5),
                'price' => $faker->randomFloat(3,1,20)

            ]);

            $product_detail = $product->detail()->create([
                    'show_slider' => rand(0,1),
                    'show_day_chance' => rand(0,1),
                    'show_more_showned' => rand(0,1),
                    'show_bestselled' => rand(0,1),
                    'show_discounted' => rand(0,1)

                ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


    }
}
