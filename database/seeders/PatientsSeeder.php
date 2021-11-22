<?php

namespace Database\Seeders;

use App\Models\Patients;
use App\Models\JenisKelamin;
use App\Models\StatusPatients;
use Illuminate\Database\Seeder;

class PatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $status = StatusPatients::get();
        $jenisKelamin = JenisKelamin::get();
        Patients::create([
            'name'          => 'Toniyansyah Wahyudi',
            'jk_id'         => $jenisKelamin[0]->id,
            'phone'         => '+6283232323',
            'address'       => 'Jl. Cikampak No. 4 RT 04',
            'status_id'     => $status[0]->id,
            'in_date_at'    => '2021-11-19',
            'out_date_at'    => '2021-11-20'
        ]);

        Patients::create([
            'name'          => 'Roni',
            'jk_id'         => $jenisKelamin[0]->id,
            'phone'         => '+6283232323',
            'address'       => 'Jl. Jakbar No. 4 RT 04',
            'status_id'     => $status[1]->id,
            'in_date_at'    => '2021-11-19',
            'out_date_at'    => '2021-11-20'
        ]);

        Patients::create([
            'name'          => 'Annisa',
            'jk_id'         => $jenisKelamin[1]->id,
            'phone'         => '+6283232323',
            'address'       => 'Jl. Depok No. 4 RT 04',
            'status_id'     => $status[2]->id,
            'in_date_at'    => '2021-11-02',
            'out_date_at'    => '2021-11-03'
        ]);
    }
}
