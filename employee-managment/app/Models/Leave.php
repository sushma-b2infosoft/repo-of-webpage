<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    //
    protected $fillable = [
    'employee_name', 'from_date', 'to_date', 'reason'
];

}
