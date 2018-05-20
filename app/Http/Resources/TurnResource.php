<?php

namespace App\Http\Resources;

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
            'title' => Carbon::createFromFormat('Y-m-d H:i:s', $this->start)->format('H:i') . ' Hs - ' .$this->contact->name,
            'url' => route('turns.show', $this),
            'class' => 'event-important',
            'start' => Carbon::createFromFormat('Y-m-d H:i:s', $this->start)->getTimestamp() * 1000,
            'end' => Carbon::createFromFormat('Y-m-d H:i:s', $this->end)->getTimestamp() * 1000,
            'meta' => [
                'date' => Carbon::createFromFormat('Y-m-d H:i:s', $this->start)->format('d/m/Y'),
            ]
        ];
    }
}
