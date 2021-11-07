<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kind extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'current_health_points',
        'max_health_points',
        'current_strength_points',
        'current_money',
        'items_possessed'
    ];

    public function heroes(){
        return $this->belongsToMany(Hero::class);
    }
}
