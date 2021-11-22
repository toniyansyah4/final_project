<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPatients extends Model
{
    use HasFactory;

    protected $table = 'status_patients';

    protected $fillable = [
        'status'
    ];

    public function patients()
    {
        return $this->hasMany(Patients::class);
    }
}
