<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $primaryKey = 'pid';
  
    use HasFactory;



    protected $fillable = [
        'title',
        'content',
        'paper_status',
    ];
}
