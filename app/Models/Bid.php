<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $primaryKey = 'bid';

    protected $fillable = [
        'paper_id',
        'user_id',
        'isAwarded',
    ];
}
