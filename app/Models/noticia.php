<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class noticia extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'conteudo' , 'img', 'cod_categoria'];

    public function categoria(){
        //belongsTo =  pertence a um (class , a chave local, chave estrangeira)
        return $this->belongsTo(categoria::class, 'cod_categoria' , 'id');
    }
}
