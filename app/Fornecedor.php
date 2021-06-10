<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Produto;

class Fornecedor extends Model
{
    use SoftDeletes;
    protected $table = 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email'];

    public function produtos(){
          //Especificar FK e PK quando não trabalhar com os nomes padrões 
          //return $this->hasMany('App\Produto', 'fornecedor_id', 'id');

          return $this->hasMany('App\Produto');
    }
}
