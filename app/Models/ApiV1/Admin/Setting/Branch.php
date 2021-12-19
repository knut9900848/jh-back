<?php

namespace App\Models\ApiV1\Admin\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $casts = [
        'is_active' => 'boolean'
    ];
}
