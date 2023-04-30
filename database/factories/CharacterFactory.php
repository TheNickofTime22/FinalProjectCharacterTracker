<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Character>
 */
class CharacterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $level = rand(1, 19);
        $nextLevel = [0 => '0', 1 => '300', 2 => '900', 3 => '2700', 4 => '6500', 5 => '14000', 6 => '23000', 7 => '34000', 8 => '48000', 9 => '64000', 10 => '85000', 11 => '100000', 12 => '120000', 13 => '140000', 14 => '165000', 15 => '195000', 16 => '225000', 17 => '265000', 18 => '305000', 19 => '355000', 20 => '500000', ];

        $numbers = range(8, 20);
        shuffle($numbers);
        $stats = array_slice($numbers, 7);

        return [
            'player_name' => fake()->firstName(),
            'char_name' => fake()->firstName(),
            'char_level' => $level,
            'char_class' => fake()->randomElement(['Artificer', 'Barbarian', 'Bard', 'Cleric', 'Druid', 'Fighter', 'Monk', 'Paladin', 'Ranger', 'Rouge', 'Sorcerer', 'Warlock', 'Wizard' ]),
            'char_species' => fake()->randomElement(['Aasimar', 'Bugbear', 'Dragonborn', 'Dwarf', 'Elf', 'Gnome', 'Goblin', 'Halfling', 'Human', 'Orc', 'Tiefling', 'Triton', 'Warforged' ]),
            'char_background' => fake()->randomElement(['Acolyte', 'Charlatan', 'Criminal', 'Entertainer', 'Folk Hero', 'Guild Artisan', 'Hermit', 'Outlander', 'Noble', 'Sage', 'Sailor', 'Soldier', 'Urchin' ]),
            'char_stats' => implode(", ", $stats),
            'char_experience' => fake()->numberBetween($nextLevel[($level - 1)], (($nextLevel[$level]) - 1)),
            'char_nextLevel' => $nextLevel[$level],


        ];
    }
}
