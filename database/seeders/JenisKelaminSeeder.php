<?php

namespace Database\Seeders;

use App\Models\JenisKelamin;
use Illuminate\Database\Seeder;

class JenisKelaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisKelamin::create([
            'jenis_kelamin'          => 'Laki Laki',
        ]);

        JenisKelamin::create([
            'jenis_kelamin'          => 'Perempuan',
        ]);

    }
}
