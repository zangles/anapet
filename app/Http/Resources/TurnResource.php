<?php

namespace App\Http\Resources;

use App\TurnType;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TurnResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->turnType->name . ' Hs - ' .$this->contact->name,
            'url' => route('turns.show', $this),
            'class' => TurnType::getTurnClass($this->turn_type_id),
            'start' => Carbon::createFromFormat('Y-m-d', $this->date)->getTimestamp() * 1000,
            'end' => Carbon::createFromFormat('Y-m-d', $this->date)->addHours(1)->getTimestamp() * 1000,
            'meta' => [
                'date' => Carbon::createFromFormat('Y-m-d', $this->date)->format('d/m/Y'),
            ]
        ];
    }

}
