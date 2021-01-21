<?php

namespace App;

use App\Autor;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'contenido', 'id_autor', 'imagen',
    ];

    /*Se obtiene el autor del post via llave foranea  */ 
    public function Autor(){
        return $this->belongsTo(Autor::class, 'id');
    }
}
