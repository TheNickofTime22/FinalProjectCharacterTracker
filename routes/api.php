<?php

use App\Http\Controllers\API\CharacterController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



// get all characters of a user
Route::middleware('auth:sanctum')->group(function(){


    Route::prefix('v1')->group(function(){


        Route::apiResource('characters', CharacterController::class);

        // Route::get('/user/characters', function (Request $request) {
        //     $characters = Character::where('user_id', $request->user()->id)->get();
        //     return $characters;
        // });

    });
    Route::prefix('v2')->group(function(){

    });

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

Route::get('/login/test', function (Request $request) {
    if(auth('sanctum')->user() == null){
        return ['valid' => false];
    } else {
        return ['valid' => true];
    }

});


Route::post('/register/token', function (Request $request) {
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);


});
