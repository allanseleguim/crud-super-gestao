use App\Unidade;
Unidade::create(['unidade' => 'UN', 'descricao' => 'Unidade']);

use App\Unidade;
Unidade::create(['unidade' => 'Kg', 'descricao' => 'Quilograma']);


use App\Produto;
Produto::create(['nome' => 'Geladeira', 'descricao' => 'Geladeira/Refrigerador frost free, 375 litros', 
'peso' => 60, 'unidade_id' => 1]);

Produto::create(['nome' => 'Smart TV', 'descricao' => 'SMART tv led 43', 
'peso' => 8, 'unidade_id' => 1]);