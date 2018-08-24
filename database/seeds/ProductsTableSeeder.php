<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'demo product 1',
            'price_in_points' => 100,
            'available_in_stock' => true,
        ]);
        DB::table('products')->insert([
            'name' => 'demo product 2',
            'price_in_points' => 300,
            'available_in_stock' => true,

        ]);
        DB::table('products')->insert([
            'name' => 'demo product 3',
            'price_in_points' => 500,
            'available_in_stock' => true,
        ]);

    }
}
