<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];

    public function noticias(){
        //hasMany = tem muitos (a class , a chave estrangeira, chave local)
        return $this->hasMany(noticia::class, 'cod_categoria' , 'id');
    }
}
