<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'user_id'
    ];

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function movieBooks()
    {
        return $this->belongsToMany(MovieBook::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
