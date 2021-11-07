<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HeroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'kind' => new KindResource($this->kind),
            'user' => new UserResource($this->user),
            'current_health_points' => $this->current_health_points,
            'max_health_points' => $this->max_health_points,
            'current_strength_points' => $this->current_strength_points,
            'current_money' => $this->current_money,
            'items_possessed' => $this->items_possessed,
            'performed_fights' => $this->performed_fights,
            'money_tranfers' => $this->money_tranfers,
            'power' => $this->power,
            'attack_points' => $this->attack_points,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
