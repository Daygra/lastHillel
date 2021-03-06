<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    public function doctorsSchedules(): BelongsTo
    {
        return $this->belongsTo(Doctors::class,'doctor_id','id');
    }

    public function patient(): BelongsTo
    {
        return $this->belongsTo(User::class,'patient_id','id');
    }
}
