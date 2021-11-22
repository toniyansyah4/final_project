<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;

    protected $table = 'patients';

    protected $fillable = [
        'name', 'jk_id', 'phone', 'address', 'status_id', 'in_date_at', 'out_date_at'
    ];

    public function jenisKelamin()
    {
        return $this->belongsTo(JenisKelamin::class);
    }

    public function statusPatients()
    {
        return $this->belongsTo(StatusPatients::class);
    }
}
