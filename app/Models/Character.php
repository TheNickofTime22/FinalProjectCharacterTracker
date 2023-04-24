<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;



    protected $fillable = ['user_id', 'player_name', 'char_name', 'char_level', 'char_class', 'char_background', 'char_species', 'char_experience', 'char_stats', 'char_nextLevel'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
