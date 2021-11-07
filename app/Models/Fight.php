<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Fight extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'host_id',
        'guest_id',
        'winner_id',
        'invited_at',
        'fought_at',
        'host_money_received',
        'guest_money_received',
    ];


    public function host()
    {
        return $this->belongsTo(Hero::class, 'host_id');
    }

    public function guest()
    {
        return $this->belongsTo(Hero::class, 'guest_id');
    }

    public function winner()
    {
        return $this->belongsTo(Hero::class, 'winner_id');
    }
}
