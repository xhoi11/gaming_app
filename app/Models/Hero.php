<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'kind_id',
        'user_id',
        'current_health_points',
        'max_health_points',
        'current_strength_points',
        'current_money',
        'items_possessed',
        'performed_fights',
        'money_tranfers',
        'power',
        'attack_points'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function kind(){
        return $this->belongsTo(Kind::class);
    }
}
