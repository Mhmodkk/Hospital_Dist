<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        Section::create(['name' => 'الإسعاف', 'capacity' => 20]);
        Section::create(['name' => 'صدرية', 'capacity' => 4]);
        Section::create(['name' => 'عامة', 'capacity' => 4]);
        Section::create(['name' => 'عصبية', 'capacity' => 4]);
        Section::create(['name' => 'هضمية', 'capacity' => 4]);
        Section::create(['name' => 'عناية', 'capacity' => 12]);
    }
}
