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
            'comment' => 'comment_order1_product1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('order_product')->insert([
            'product_id' => 3,
            'order_id' => 1,
            'quantity' => 2,
            'price' => 7,
            'comment' => 'comment_order1_product3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('order_product')->insert([
            'product_id' => 4,
            'order_id' => 1,
            'quantity' => 3,
            'price' => 120,
            'comment' => 'comment_order1_product4',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        // Seed Order2 order
        DB::table('order_product')->insert([
            'product_id' => 1,
            'order_id' => 2,
            'quantity' => 3,
            'price' => 39,
            'comment' => 'comment_order2_product1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('order_product')->insert([
            'product_id' => 3,
            'order_id' => 2,
            'quantity' => 21,
            'price' => 294,
            'comment' => 'comment_order2_product3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('order_product')->insert([
            'product_id' => 6,
            'order_id' => 2,
            'quantity' => 40,
            'price' => 1237,
            'comment' => 'comment_order2_product6',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        // Seed Order3 order
        DB::table('order_product')->insert([
            'product_id' => 1,
            'order_id' => 3,
            'quantity' => 5,
            'price' => 15,
            'comment' => 'comment_order3_product1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('order_product')->insert([
            'product_id' => 3,
            'order_id' => 3,
            'quantity' => 2,
            'price' => 71,
            'comment' => 'comment_order3_product3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('order_product')->insert([
            'product_id' => 4,
            'order_id' => 3,
            'quantity' => 3,
            'price' => 1220,
            'comment' => 'comment_order3_product4',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        // Seed Order4 order
        DB::table('order_product')->insert([
            'product_id' => 1,
            'order_id' => 4,
            'quantity' => 3,
            'price' => 397,
            'comment' => 'comment_order4_product1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('order_product')->insert([
            'product_id' => 3,
            'order_id' => 4,
            'quantity' => 21,
            'price' => 2924,
            'comment' => 'comment_order4_product3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('order_product')->insert([
            'product_id' => 6,
            'order_id' => 4,
            'quantity' => 40,
            'price' => 17,
            'comment' => 'comment_order4_product6',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);


    }
}
