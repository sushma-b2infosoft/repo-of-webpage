<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    protected $fillable = [
        'from', 'to', 'client_id', 'project_id', 'task'
    ];
}
