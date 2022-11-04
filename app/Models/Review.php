<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'paper_id',
        'user_id',
        'paper_rating',
        'review_status',
        'review_rating',
    ];
}
