<?php

namespace App\Models\Apiv1\admin\setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $casts = [
        'is_active' => 'boolean'
    ];
}
