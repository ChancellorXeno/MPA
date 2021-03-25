<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['id' => 1, 'name' => 'Red', 'price' => 24.99, 'image' => '/MPA/public/images/colors/red.png'],
            ['id' => 2, 'name' => 'Green', 'price' => 24.99, 'image' => '/MPA/public/images/colors/green.png'],
            ['id' => 3, 'name' => 'Blue', 'price' => 24.99, 'image' => '/MPA/public/images/colors/blue.png'],
            ['id' => 4, 'name' => 'Yellow', 'price' => 49.99, 'image' => '/MPA/public/images/colors/yellow.png'],
            ['id' => 5, 'name' => 'Cyan', 'price' => 49.99, 'image' => '/MPA/public/images/colors/cyan.png'],
            ['id' => 6, 'name' => 'Magenta', 'price' => 49.99, 'image' => '/MPA/public/images/colors/magenta.png'],
            ['id' => 7, 'name' => 'Orange', 'price' => 74.99, 'image' => '/MPA/public/images/colors/orange.png'],
            ['id' => 8, 'name' => 'Chartreuse Green', 'price' => 74.99, 'image' => '/MPA/public/images/colors/chartreuse-green.png'],
            ['id' => 9, 'name' => 'Spring Green', 'price' => 74.99, 'image' => '/MPA/public/images/colors/spring-green.png'],
            ['id' => 10, 'name' => 'Azure', 'price' => 74.99, 'image' => '/MPA/public/images/colors/azure.png'],
            ['id' => 11, 'name' => 'Violet', 'price' => 74.99, 'image' => '/MPA/public/images/colors/violet.png'],
            ['id' => 12, 'name' => 'Rose', 'price' => 74.99, 'image' => '/MPA/public/images/colors/rose.png'],
            ['id' => 13, 'name' => 'Pastel Red', 'price' => 99.99, 'image' => '/MPA/public/images/pastel/p-red.png'],
            ['id' => 14, 'name' => 'Pastel Green', 'price' => 99.99, 'image' => '/MPA/public/images/pastel/p-green.png'],
            ['id' => 15, 'name' => 'Pastel Blue', 'price' => 99.99, 'image' => '/MPA/public/images/pastel/p-blue.png'],
            ['id' => 16, 'name' => 'Pastel Yellow', 'price' => 99.99, 'image' => '/MPA/public/images/pastel/p-yellow.png'],
            ['id' => 17, 'name' => 'Pastel Orange', 'price' => 99.99, 'image' => '/MPA/public/images/pastel/p-orange.png'],
            ['id' => 18, 'name' => 'Pastel Purple', 'price' => 99.99, 'image' => '/MPA/public/images/pastel/p-purple.png'],
            ['id' => 19, 'name' => 'Pastel Violet', 'price' => 99.99, 'image' => '/MPA/public/images/pastel/p-violet.png'],
            ['id' => 20, 'name' => 'Pastel Magenta', 'price' => 99.99, 'image' => '/MPA/public/images/pastel/p-magenta.png'],
            ['id' => 21, 'name' => 'Pastel Pink', 'price' => 99.99, 'image' => '/MPA/public/images/pastel/p-pink.png'],
            ['id' => 22, 'name' => 'Pastel Brown', 'price' => 89.99, 'image' => '/MPA/public/images/pastel/p-brown.png'],
            ['id' => 23, 'name' => 'Very Light Grey', 'price' => 99.99, 'image' => '/MPA/public/images/shades/very-light-grey.png'],
            ['id' => 24, 'name' => 'Light Grey', 'price' => 99.99, 'image' => '/MPA/public/images/shades/light-grey.png'],
            ['id' => 25, 'name' => 'Grey', 'price' => 99.99, 'image' => '/MPA/public/images/shades/grey.png'],
            ['id' => 26, 'name' => 'Dark Grey', 'price' => 99.99, 'image' => '/MPA/public/images/shades/dark-grey.png'],
            ['id' => 27, 'name' => 'Very Dark Grey', 'price' => 99.99, 'image' => '/MPA/public/images/shades/very-dark-grey.png'],
            ['id' => 28, 'name' => 'Black', 'price' => 99.99, 'image' => '/MPA/public/images/shades/black.png'],
            ['id' => 29, 'name' => 'Rainbow', 'price' => 1250.00, 'image' => '/MPA/public/images/colors/rainbow.png']
        ]);
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Primary'],
            ['id' => 2, 'name' => 'Secondary'],
            ['id' => 3, 'name' => 'Tertiary'],
            ['id' => 4, 'name' => 'Pastel'],
            ['id' => 5, 'name' => 'Shades'],
            ['id' => 6, 'name' => 'Special']
        ]);
        DB::table('product_category')->insert([
            ['product_id' => 1, 'category_id' => 1],
            ['product_id' => 2, 'category_id' => 1],
            ['product_id' => 3, 'category_id' => 1],
            ['product_id' => 4, 'category_id' => 2],
            ['product_id' => 5, 'category_id' => 2],
            ['product_id' => 6, 'category_id' => 2],
            ['product_id' => 7, 'category_id' => 3],
            ['product_id' => 8, 'category_id' => 3],
            ['product_id' => 9, 'category_id' => 3],
            ['product_id' => 10, 'category_id' => 3],
            ['product_id' => 11, 'category_id' => 3],
            ['product_id' => 12, 'category_id' => 3],
            ['product_id' => 13, 'category_id' => 4],
            ['product_id' => 14, 'category_id' => 4],
            ['product_id' => 15, 'category_id' => 4],
            ['product_id' => 16, 'category_id' => 4],
            ['product_id' => 17, 'category_id' => 4],
            ['product_id' => 18, 'category_id' => 4],
            ['product_id' => 19, 'category_id' => 4],
            ['product_id' => 20, 'category_id' => 4],
            ['product_id' => 21, 'category_id' => 4],
            ['product_id' => 22, 'category_id' => 4],
            ['product_id' => 23, 'category_id' => 5],
            ['product_id' => 23, 'category_id' => 4],
            ['product_id' => 24, 'category_id' => 5],
            ['product_id' => 25, 'category_id' => 5],
            ['product_id' => 26, 'category_id' => 5],
            ['product_id' => 27, 'category_id' => 5],
            ['product_id' => 28, 'category_id' => 5],
            ['product_id' => 29, 'category_id' => 6],
            ['product_id' => 29, 'category_id' => 1],
            ['product_id' => 29, 'category_id' => 2],
            ['product_id' => 29, 'category_id' => 3]
        ]);
    }
}