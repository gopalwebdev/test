<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationDetail extends Model
{
    protected $fillable = [
        'user_id',
        'collage',
        'branch',
        'passed_out_year'
    ];
}
