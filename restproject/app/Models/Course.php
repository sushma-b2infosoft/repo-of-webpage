<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    // Many to Many
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}

