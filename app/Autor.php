<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellidos', 'nombre_completo',
    ];

    /*Relación de uno a muchos Autor a Blog*/
    public function post(){
        return $this->hasMany(Post::class);
    }
}
