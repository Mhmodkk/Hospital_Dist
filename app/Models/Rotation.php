<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Rotation extends Model
{
    protected $fillable = ['student_id', 'section_id', 'start_date', 'end_date', 'is_active'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
