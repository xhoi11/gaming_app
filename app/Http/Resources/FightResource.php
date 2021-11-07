<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FightResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,

            'host' => new HeroResource($this->host),
            'host_id' => $this->host_id,
            'guest' => new HeroResource($this->guest),
            'guest_id' => $this->guest_id,
            'winner' => new HeroResource($this->winner),
            'winner_id' => $this->winner_id,
            'invited_at' => $this->invited_at,
            'fought_at' => $this->fought_at,
            'host_money_received' => $this->host_money_received,
            'guest_money_received' => $this->guest_money_received,

        ];
    }
}
