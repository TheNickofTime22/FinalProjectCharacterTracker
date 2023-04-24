<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateCharacterRequest;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function __construct()
    {
        $this->authorizeResource(Character::class, 'character');
    }

    public function index()
    {
        $characters = Character::all();
        return view('character.character', ['characters' => $characters]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('character.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $nextLevel = [0 => '0', 1 => '300', 2 => '900', 3 => '2700', 4 => '6500', 5 => '14000', 6 => '23000', 7 => '34000', 8 => '48000', 9 => '64000', 10 => '85000', 11 => '100000', 12 => '120000', 13 => '140000', 14 => '165000', 15 => '195000', 16 => '225000', 17 => '265000', 18 => '305000', 19 => '355000', 20 => '500000', ];
    $numbers = range(8, 20);
    shuffle($numbers);
    $stats = array_slice($numbers, 7);

    $validatedData = $request->validate([
        'char_name' => 'required|string',
        'char_class' => 'required|string',
        'char_species' => 'required|string',
        'char_level' => 'required|numeric',
        'char_background' => 'required|string',
        'char_experience' => 'required|numeric'
    ]);

    // Get the user's level
    $userLevel = $validatedData['char_level'];

    // Calculate the next level
    $nextLevelValue = isset($nextLevel[$userLevel]) ? $nextLevel[$userLevel] : '';

    // Add the next level value to the data
    $characterData = array_merge($validatedData, [
        'user_id' => $request->user()->id,
        'char_nextLevel' => $nextLevelValue,
        'player_name' => $request->user()->name,
        'char_stats' => implode(", ", $stats)
    ]);

    $character = Character::create($characterData);

    return response()->json([
        'message' => 'Character created successfully',
        'character' => $character
    ], 201);
}


    /**
     * Display the specified resource.
     */
    public function show(Character $character, UpdateCharacterRequest $request)
    {
        $character->update($request->all());
        $character->save();
        session()->flash('status', 'character was edited successfully.');
        return redirect('/home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        return view('character.edit', ['character' => $character]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Character $character, UpdateCharacterRequest $request)
    {




        $character->update($request->all());
        $character->save();
        session()->flash('status', 'character was edited successfully.');
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        $character->delete();
        session()->flash('status', 'character was destroyed successfully.');
        return redirect('/home');
    }


}
