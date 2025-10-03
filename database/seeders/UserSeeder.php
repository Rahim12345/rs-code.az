<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'=>'Rahim Süleymanov',
            'email'=>'rahim.suleymanov94@gmail.com',
            'password'=>bcrypt(12345678)
        ]);
    }
}
