<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Law;

class LawSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Law::updateOrCreate([
            'user_id' => 1,
            'name' => 'รัฐธรรมนูญแห่งราชอาณาจักรไทย',
        ]);
        Law::updateOrCreate([
            'user_id' => 1,
            'name' => 'กฎหมาย',
        ]);
        Law::updateOrCreate([
            'user_id' => 1,
            'name' => 'คำสั่งคณะรักษาความสงบแห่งชาติ (คสช.)',
        ]);
        Law::updateOrCreate([
            'user_id' => 1,
            'name' => 'แนววินิจฉัย ก.ค.ศ.',
        ]);
        Law::updateOrCreate([
            'user_id' => 1,
            'name' => 'พระราชบัญญัติ (พรบ.)',
        ]);
        Law::updateOrCreate([
            'user_id' => 1,
            'name' => 'ระเบียบ',
        ]);
        Law::updateOrCreate([
            'user_id' => 1,
            'name' => 'หนังสือเวียน และอื่น ๆ',
        ]);
    }
}
