<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Character;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// get all characters of a user
Route::middleware('auth:sanctum')->group(function(){
    Route::prefix('v1')->group(function(){
        Route::get('/user/characters', function (Request $request) {
            $characters = Character::where('user_id', $request->user()->id)->get();
            return $characters;
        });
    });
    Route::prefix('v2')->group(function(){

    });

});


// create a character
Route::middleware('auth:sanctum')->post('/characters', function (Request $request) {
    $user = $request->user();
    $characterData = $request->only('char_name', 'char_class', 'char_stats', 'char_species', 'char_level', 'char_background', 'char_experience', 'char_nextLevel');
    $characterData['user_id'] = $user->id;
    $character = Character::create($characterData);
    return response()->json(['message' => 'Character created successfully', 'character' => $character]);
});

// update a character
Route::middleware('auth:sanctum')->put('/characters/{id}', function (Request $request, $id) {
    $user = $request->user();
    $character = Character::where('id', $id)->where('user_id', $user->id)->firstOrFail();
    $characterData = $request->only('char_name', 'char_class', 'char_stats', 'char_species', 'char_level', 'char_background', 'char_experience', 'char_nextLevel');
    $character->update($characterData);
    return response()->json(['message' => 'Character updated successfully', 'character' => $character]);
});

// login as a user and get a token
Route::post('/login/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'error' => ['The provided credentials are incorrect.'],
        ]);
    }

    $tokenText = $user->createToken($request->device_name)->plainTextToken;
    return ['token' => $tokenText];
});

Route::post('/register/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);


});
