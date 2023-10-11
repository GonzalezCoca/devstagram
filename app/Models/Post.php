<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class)->select(['name', 'username']);
        //relacion -> un post pertenece a un usuario
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class);
        //Un post va a tener multiples comentarios
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }
    public function checkLike(User $user){
        return $this->likes->contains('user_id', $user->id);
    }
}
