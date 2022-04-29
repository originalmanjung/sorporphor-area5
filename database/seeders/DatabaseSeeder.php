<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(PermissionSeeder::Class);
        $this->call(RoleSeeder::Class);
        $this->call(UserSeeder::Class);
        $this->call(LegislationListSeeder::Class);
        $this->call(PersonalSeeder::Class);
        $this->call(ItaSeeder::Class);
        $this->call(IntergritySeeder::Class);
    }
}
