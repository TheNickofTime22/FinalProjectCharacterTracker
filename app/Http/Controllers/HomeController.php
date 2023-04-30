<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Character;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->characters->count() === 0) {
            // If the user doesn't have any characters, create a new default character and associate it with the user
            $character = new Character([
                'player_name' => $user->name,
                'char_name' => 'Default',
                'char_class' => 'Fighter',
                'char_background' => 'Sage',
                'char_species' => 'Human',
                'char_level' => '1',
                'char_stats' => '12, 10, 16, 17, 15, 16',
                'char_experience' => '0',
                'char_nextLevel' => '300',
                'user_id' => $user->id,
            ]);
            $character->save();

            $character = new Character([
                'player_name' => $user->name,
                'char_name' => 'Default2',
                'char_class' => 'Wizard',
                'char_background' => 'Sailor',
                'char_species' => 'Elf',
                'char_level' => '1',
                'char_stats' => '10, 15, 12, 17, 15, 16',
                'char_experience' => '0',
                'char_nextLevel' => '300',
                'user_id' => $user->id,
            ]);
            $character->save();
        }
        $characters = auth()->user()->characters;

        return view('home', compact('characters'));
    }

}
