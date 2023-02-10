<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contato;
use App\Models\User;

class Contato extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome','email','telefone','foto','user_id'
    ];

    public function users(){

        return $this->belongsTo(User::class);
    }
}
