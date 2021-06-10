<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{




    protected $fillable = ['id', 'cliente_id', 'created_at', 'updated_at'];
    public function produtos() {
         // return $this->belongsToMany('App\Produto', 'pedidos_produtos');


         return $this->belongsToMany('App\Item', 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('created_at');

         /* 
         
         1 - MOdelo od relacionamento NxN em relação ao modelo que estmaos implementando
         2 - Tabela auxiliar que armazena os registros de relacionamento 
         3 - Representa o nome da FK da tabela mapeada pelo model na tabela de relacionamento
         4 - Representa o nome da FK da tabela mapeada pelo model utilizado no relacionamento que estamos implementando
         */

    }
}
