<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function autor(){
        return $this->belongsTo(Autor::class);
    }
}
