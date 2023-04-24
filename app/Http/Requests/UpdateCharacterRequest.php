<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCharacterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules()
    {
        return [
            // 'char_name' => 'required|max:32',

            // 'char_class' => 'required|in:Artificer,Barbarian,Bard,Cleric,Druid,Fighter,Monk,Paladin,Ranger,Rogue,Sorcerer,Warlock,Wizard',

            // 'char_background' => 'required|in:Acolyte,Charlatan,Criminal,Entertainer,Folk Hero,Guild Artisan,Hermit,Outlander,Noble,Sage,Sailor,Soldier,Urchin',

            // 'char_species' => 'required|in:Aasimar,Bugbear,Dragonborn,Dwarf,Elf,Gnome,Goblin,Halfling,Human,Orc,Tiefling,Triton,Warforged',

            // 'char_level' => 'required|numeric|min:1|max:20',

            // 'char_experience' => 'required|numeric|min:' . $this->calculateExperienceRange()[0] . '|max:' . $this->calculateExperienceRange()[1],
        ];
    }

    private function calculateExperienceRange()
    {
        // $nextLevel = [0 => '0', 1 => '300', 2 => '900', 3 => '2700', 4 => '6500', 5 => '14000', 6 => '23000', 7 => '34000', 8 => '48000', 9 => '64000', 10 => '85000', 11 => '100000', 12 => '120000', 13 => '140000', 14 => '165000', 15 => '195000', 16 => '225000', 17 => '265000', 18 => '305000', 19 => '355000', 20 => '500000', ];

        // $charLevel = $this->request->get('char_level');

        // $nextLevelExperience = $nextLevel[$charLevel];

        // $previousLevelExperience = $nextLevel[$charLevel-1];

        // return [$previousLevelExperience, $nextLevelExperience];
    }
}
