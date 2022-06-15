<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Groupe extends Model
{
    use HasFactory;

    protected $fillable=[
        'nom','description'
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
}
