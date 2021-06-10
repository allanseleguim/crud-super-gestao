<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{


  
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];
    public function produtoDetalhe() {
          return $this->hasOne('App\ProdutoDetalhe');

          /* cada produto tem 1 produto detalhe */ 

          /* Do lado do ID tem que ter hasOne, do lado da FOREIGN_KEY tem que ter belongsTo */ 
    }
}
