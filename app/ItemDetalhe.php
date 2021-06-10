<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    

      protected $table = 'produto_detalhes';
      protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];
   
      public function item() {

      
      //Definindo relacionamento 
            //Sintaxe entidade, FOREIGN_KEY, PRIMARY_KEY 
          return $this->belongsTo('App\Item', 'produto_id', 'id');

          /* cada produto tem 1 produto detalhe */ 

          /* Do lado do ID tem que ter hasOne, do lado da FOREIGN_KEY tem que ter belongsTo */ 
    }
}     
