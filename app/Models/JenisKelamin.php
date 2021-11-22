<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKelamin extends Model
{
    use HasFactory;

    protected $table = 'jenis_kelamin_patients';

    protected $fillable = [
        'jenis_kelamin'
    ];

    public function patients()
    {
        return $this->hasMany(Patients::class);
    }
}
