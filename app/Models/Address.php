<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['address_one', 'city', 'district_id'];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }
}