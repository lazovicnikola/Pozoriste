<?php

namespace Database\Seeders;

use App\Models\Hall;
use App\Models\Seat;
use Illuminate\Database\Seeder;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pronalazimo sale ili ih kreiramo ako ne postoje
        $largeHall = Hall::firstOrCreate(['name' => 'Velika Sala']);
        $smallHall = Hall::firstOrCreate(['name' => 'Mala Sala']);

        $largeHallRows = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII', 'XIII'];
        $largeHallSeats = [
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16],
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17],
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18],
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17],
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18],
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17],
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18],
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17],
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18],
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17],
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16],
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16],
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
        ];

        // Definišemo raspored sedišta za malu salu
        $smallHallRows = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII'];
        $smallHallSeats = [
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
        ];

        // Ubacivanje sedišta za veliku salu
        foreach ($largeHallRows as $rowIndex => $row) {
            foreach ($largeHallSeats[$rowIndex] as $seatNumber) {
                Seat::create([
                    'row' => $row,
                    'number' => $seatNumber,
                    'hall_id' => $largeHall->id, // Veza sa velikom salom
                ]);
            }
        }
        // Ubacivanje sedišta za malu salu
        foreach ($smallHallRows as $rowIndex => $row) {
            foreach ($smallHallSeats[$rowIndex] as $seatNumber) {
                Seat::create([
                    'row' => $row,
                    'number' => $seatNumber,
                    'hall_id' => $smallHall->id, // Veza sa malom salom
                ]);
            }
        }
    }
}
