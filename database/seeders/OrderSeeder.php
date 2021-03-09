<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::create([
            'id' => 1,
            'order_number' => 'Cybersecurity, Digital Forensics & Systems Security_001_2000',
            'section_id' => 1,
            'user_id' => 1,
            'date' => '2000-01-01',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        Order::create([
            'id' => 2,
            'order_number' => 'Petroleum Engineering_001_2020',
            'section_id' => 12,
            'user_id' => 2,
            'date' => '2020-07-13',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        Order::create([
            'id' => 3,
            'order_number' => 'Systems Security_001_2000',
            'section_id' => 4,
            'user_id' => 1,
            'date' => '2000-01-01',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        Order::create([
            'id' => 4,
            'order_number' => 'Engineering_001_2020',
            'section_id' => 11,
            'user_id' => 2,
            'date' => '2020-07-13',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
