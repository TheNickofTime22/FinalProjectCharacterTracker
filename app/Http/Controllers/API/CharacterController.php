<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CharacterResource;
use App\Http\Resources\CharactersResource;
use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Auth::user()->characters();

        if($request->input('sort')){
            $columns = explode(',', $request->input('sort'));
            foreach($columns as $column){
                if(substr($column, 0, 1) == '-'){

                    $query = $query->orderBy(ltrim($column, '-'), 'desc');

                } else {

                    $query = $query->orderBy($column, 'asc');

                }
            }
        }

        if($request->input('page')){
            return new CharactersResource($query->paginate(2));
        }
        return new CharactersResource($query->get());

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        $character = new Character($request->all());
        $character->save();
        return response()->json([
            "message" => "Character Created"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        if($character->user_id == Auth::user()->id){
            return new CharacterResource($character);
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Character $character)
    {
        if($character->user_id == Auth::user()->id){
            $character->update($request->all());
            return response()->json([
                "message" => "Character Updated"
            ], 200);
        }
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        if($character->user_id == Auth::user()->id){
            $character->delete();
            return response()->json([
                "message" => "Character Deleted"
            ], 202);
        }
        abort(403);
    }
}
