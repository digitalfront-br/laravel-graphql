<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'use',
        'result',
        'tooltype_id'
    ];
}
