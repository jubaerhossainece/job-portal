<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::updateOrCreate([
            'name' => 'Md. Jubaer Hossain',
            'email' => 'admin@mailnator.com',
            'password' => Hash::make('12345678')
        ]);
    }
}
