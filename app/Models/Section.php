<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name', 'capacity'];
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function rotations()
    {
        return $this->hasMany(Rotation::class);
    }
}
