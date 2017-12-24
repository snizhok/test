<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $faker = Faker\Factory::create('ru_RU');
        $i = 0;

        $categories = \DB::table('categories')->pluck('id');
        while ($i <= 5000) {

            $product_id = DB::table('products')->insertGetId([
                'name'  => $faker->word,
                'price' => $faker->randomNumber(2)
            ]);
            $num = mt_rand(0, 4);
            $addedCats = [];
            for ($j = 0; $j <= $num; $j++) {
                $category_id = $categories->get(mt_rand(0, $categories->count() - 1));
                if (!in_array($category_id, $addedCats)) {
                    $addedCats[] = $category_id;
                    DB::table('products_categories')->insert([
                        'product_id'  => $product_id,
                        'category_id' => $category_id
                    ]);
                }
            }
            $i++;
        }



    }
}
