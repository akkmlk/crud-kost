<?php

namespace Database\Seeders;

use App\Models\kamar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyKamarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data_kamar = [
            [
                'jenis_kamar' => "kecil",
            ],
            [
                'jenis_kamar' => "sedang",
            ],
            [
                'jenis_kamar' => "besar",
            ],
        ];
        
        foreach ($data_kamar as $value) {
            kamar::create($value);
        }
    }
}
