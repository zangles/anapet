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
        $start = Carbon::createFromFormat('Y-m-d', $this->date)->midDay()->getTimestamp() * 1000;
        $title = $this->turnType->name . ' - ' .$this->contact->name;
        if ($this->turn_type_id == 6) {
            $end = Carbon::createFromFormat('Y-m-d', $this->date)->midDay()->addHours(24)->getTimestamp() * 1000;
            $title = Carbon::createFromFormat('Y-m-d', $this->date)->format('Y-m-d') . ' - ' . $this->turnType->name . ' - ' .$this->contact->name;
        } else {
            $end = Carbon::createFromFormat('Y-m-d', $this->date)->midDay()->addHours(1)->getTimestamp() * 1000;
        }

        return [
            'id' => $this->id,
            'title' => $title,
            'url' => route('turns.show', $this),
            'class' => TurnType::getTurnClass($this->turn_type_id),
            'start' => $start,
            'end' => $end,
            'meta' => [
                'title' => $this->turnType->name . ' - ' .$this->contact->name,
                'date' => Carbon::createFromFormat('Y-m-d', $this->date)->format('d/m/Y'),
            ]
        ];
    }

}
