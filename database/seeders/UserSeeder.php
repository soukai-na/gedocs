<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin12345'),
            'nom' => 'Arrouchi',
            'prenom' => 'Hassan',
            'nomar' => 'عروشي',
            'prenomar' => 'حسن',
            'telephone' => '0662467704',
            'image' => 'ARROUCHI.jpg',
            'role'=>User::ADMIN_ROLE ,
            'status' => User::ACTIVE_STATUS,
            'folder_id'=>1,
            'groupe_id'=>1
        ]);
        User::create([
            'email'=>'lasfar@gmail.com',
            'password'=>Hash::make('lasfar12345'),
            'nom' => 'Lasfar',
            'prenom' => 'Abderrahim',
            'nomar' => 'الأصفر',
            'prenomar' => 'عبدالرحيم',
            'telephone' => '0662236187',
            'image' => 'LASFAR.jpg',
            'role'=>User::USER_ROLE ,
            'status' => User::INACTIVE_STATUS,
            'folder_id'=>2,
            'groupe_id'=>2
        ]);
    }
}
