<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed Order1 order
        DB::table('order_product')->insert([
            'product_id' => 1,
            'order_id' => 1,
            'quantity' => 5,
            'price' => 10.5,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('order_product')->insert([
            'product_id' => 3,
            'order_id' => 1,
            'quantity' => 2,
            'price' => 7,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('order_product')->insert([
            'product_id' => 4,
            'order_id' => 1,
            'quantity' => 3,
            'price' => 120,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        // Seed Order2 order
        DB::table('order_product')->insert([
            'product_id' => 1,
            'order_id' => 2,
            'quantity' => 3,
            'price' => 39,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('order_product')->insert([
            'product_id' => 3,
            'order_id' => 2,
            'quantity' => 21,
            'price' => 294,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('order_product')->insert([
            'product_id' => 6,
            'order_id' => 2,
            'quantity' => 40,
            'price' => 1237,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        // Seed Order3 order
        DB::table('order_product')->insert([
            'product_id' => 1,
            'order_id' => 3,
            'quantity' => 5,
            'price' => 15,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('order_product')->insert([
            'product_id' => 3,
            'order_id' => 3,
            'quantity' => 2,
            'price' => 71,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('order_product')->insert([
            'product_id' => 4,
            'order_id' => 3,
            'quantity' => 3,
            'price' => 1220,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        // Seed Order4 order
        DB::table('order_product')->insert([
            'product_id' => 1,
            'order_id' => 4,
            'quantity' => 3,
            'price' => 397,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('order_product')->insert([
            'product_id' => 3,
            'order_id' => 4,
            'quantity' => 21,
            'price' => 2924,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('order_product')->insert([
            'product_id' => 6,
            'order_id' => 4,
            'quantity' => 40,
            'price' => 17,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);


    }
}
