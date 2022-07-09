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
        $this->call(PersonalSeeder::Class);
        $this->call(IntergritySeeder::Class);
        $this->call(LawSeeder::Class);
        $this->call(StandardPraticeGuideSeeder::Class);
        $this->call(StandardServiceSeeder::Class);
        $this->call(HumanResourceSeeder::Class);
    }
}
