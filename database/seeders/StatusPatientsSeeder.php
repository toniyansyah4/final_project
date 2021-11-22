<?php

namespace Database\Seeders;

use App\Models\StatusPatients;
use Illuminate\Database\Seeder;

class StatusPatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusPatients::create([
            'status'          => 'Positif',
        ]);

        StatusPatients::create([
            'status'          => 'Recovered',
        ]);

        StatusPatients::create([
            'status'          => 'Dead',
        ]);
    }
}
