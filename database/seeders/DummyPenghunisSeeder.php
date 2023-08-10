<?php

namespace Database\Seeders;

use App\Models\Penghuni;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyPenghunisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_penghuni = [
            [
                'kamar_id' => "1",
                'nama_penghuni' => "Jamal",
                'address' => "Cigayam",
                'penjamin' => "Orang Tua",
            ],
            [
                'kamar_id' => "2",
                'nama_penghuni' => "Tono",
                'address' => "Banjarsari",
                'penjamin' => "Orang Tua",
            ],
            [
                'kamar_id' => "3",
                'nama_penghuni' => "Cecep",
                'address' => "Banjarsari",
                'penjamin' => "Orang Tua",
            ],
            [
                'kamar_id' => "1",
                'nama_penghuni' => "Jarwo",
                'address' => "Banjar",
                'penjamin' => "Orang Tua",
            ],
        ];

        foreach ($data_penghuni as $value) {
            Penghuni::create($value);
        }
    }
}
