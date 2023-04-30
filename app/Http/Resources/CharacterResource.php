<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CharacterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "type" => 'characters',
            "id" => $this->id,
            "attributes" => [
                "player_name" => $this->name,
                "char_name" => $this->char_name,
                "char_level" => $this->char_level,
                "char_class" => $this->char_class,
                "char_species" => $this->char_species,
                "char_background" => $this->char_background,
                "char_stats" => $this->char_stats,
                "char_experience" => $this->char_experience,
                "char_nextLevel" => $this->char_nextLevel
            ],

        ];
    }
}
