<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create admin account
        User::create([
            'name' => 'Ahmed-admin',
            'email' => 'ahmedfawzy@admin.com',
            'password' =>  Hash::make('P@ssw0rd'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);


        // Create user account
        User::create([
            'name' => 'Ahmed-user',
            'email' => 'ahmedfawzy@user.com',
            'password' =>  Hash::make('P@ssw0rd'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
