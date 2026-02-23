<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            ['name' => 'الإسعاف', 'capacity' => 20],
            ['name' => 'صدرية', 'capacity' => 4],
            ['name' => 'عامة', 'capacity' => 4],
            ['name' => 'عصبية', 'capacity' => 4],
            ['name' => 'هضمية', 'capacity' => 4],
            ['name' => 'عناية', 'capacity' => 12],
        ];

        foreach ($sections as $section) {
            Section::updateOrCreate(['name' => $section['name']], $section);
        }
    }
}
