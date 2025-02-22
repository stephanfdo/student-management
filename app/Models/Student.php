<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;

class Student extends Model
{
    use HasFactory;

    protected $appends = ['age', 'full_name'];
    protected $guarded = [];
    
    // Add date casting
    protected $casts = [
        'birth_date' => 'date',
    ];

    public function getAgeAttribute()
    {
        $targetDate = Carbon::create(2025, 1, 1);
    $age = $targetDate->diff($this->birth_date);
    
    $years = $age->y;
    $months = $age->m;
    $days = $age->d;

    $ageString = [];
    if ($years > 0) $ageString[] = "$years year" . ($years > 1 ? 's' : '');
    if ($months > 0) $ageString[] = "$months month" . ($months > 1 ? 's' : '');
    if ($days > 0) $ageString[] = "$days day" . ($days > 1 ? 's' : '');

    return implode(', ', $ageString) ?: '0 days';
    }

    public function getFullNameAttribute()
    {
        return trim("{$this->first_name} {$this->middle_name} {$this->last_name}");
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    protected static function booted()
    {
        // Generate temporary code first to pass DB constraints
        static::creating(function ($student) {
            $student->student_code = 'TEMP_'.Str::random(10);
        });

        // Update with proper code after creation
        static::created(function ($student) {
            $student->update([
                'student_code' => 'STU_'.str_pad($student->id, 4, '0', STR_PAD_LEFT)
            ]);
        });
    }
}