<?php

namespace Database\Seeders;

use App\Models\Hall;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            ['name' => 'Mala Sala', 'type' => 'small',
            'capacity' => 84],
            ['name' => 'Velika Sala','type' => 'large',
            'capacity' => 218]
        ];

        Hall::insert($array);
        
    }
}
