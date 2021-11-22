<?php

namespace Database\Seeders;

use App\Models\JenisKelamin;
use App\Models\Patients;
use App\Models\StatusPatients;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            JenisKelaminSeeder::class,
            StatusPatientsSeeder::class,
            PatientsSeeder::class,
        ]);
    }
}
