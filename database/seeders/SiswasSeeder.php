<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use App\Models\Siswas;
use App\Models\Siswas;
// use Faker\Factory;

class SiswasSeeder extends Seeder
{
    public function run(): void
    {
        // Menggunakan Eloquent untuk memasukkan data ke dalam tabel 'siswas'
        Siswas::create([
            'name' => 'Ajax',
            'class' => 'XII SIJA 1',
        ]);

        // Tambahkan data lainnya sesuai kebutuhan
    }
}
