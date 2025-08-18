<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Filippo',
            'surname' => 'Pastina',
            'email' => 'filippo@example.com',
            'phone' => '',
            'password' => Hash::make('admin')
        ]);

       $admin->assignRole('admin');
    }
}
