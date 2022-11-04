<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'route', 'parent_id', 'is_active'];

    public function childs() {
        return $this->hasMany('App\Models\Menu', 'parent_id', 'id');
    }
}
