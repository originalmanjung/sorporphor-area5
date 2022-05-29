<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'role_id' => Role::where('slug','admin')->first()->id,
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'username' => 'manage',
            'password' => Hash::make('11223344'),
            'status' => true,
            'deletable' => false
        ]);
        User::updateOrCreate([
            'role_id' => Role::where('slug','user')->first()->id,
            'name' => 'test',
            'email' => 'test@mail.com',
            'username' => 'test',
            'password' => Hash::make('11223344'),
            'status' => true,
            'deletable' => false
        ]);
        // User::updateOrCreate([
        //     'role_id' => Role::where('slug','โรงเรียน')->first()->id,
        //     'name' => 'User',
        //     'email' => 'user@mail.com',
        //     'username' => 'user',
        //     'password' => 'password',
        //     'status' => true,
        //     'deletable' => false
        // ]);

        // User::updateOrCreate([
        //     'role_id' => Role::where('slug','กลุ่มกฎหมายและคดี')->first()->id,
        //     'name' => 'User2',
        //     'email' => 'user2@mail.com',
        //     'username' => 'user2',
        //     'password' => 'password',
        //     'status' => true,
        //     'deletable' => false
        // ]);

        // User::updateOrCreate([
        //     'role_id' => Role::where('slug','กลุ่มอำนวยการ')->first()->id,
        //     'name' => 'User3',
        //     'email' => 'user3@mail.com',
        //     'username' => 'user3',
        //     'password' => 'password',
        //     'status' => true,
        //     'deletable' => false
        // ]);
    }
}
