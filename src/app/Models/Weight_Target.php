<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weight_Target extends Model
{
    use HasFactory;

    protected $fillable = ['target_weight'];
}
