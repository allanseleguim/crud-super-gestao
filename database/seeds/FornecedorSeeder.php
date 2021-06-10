<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {             

      //Instanciando objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'www.fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'contato@fornecedor100.com.br';
        $fornecedor->save();


        //Utilizando método CREATE, funciona apenas com FILLABLE 

        Fornecedor::create([
              'nome' => 'Fornecedor 200',
              'site' => 'fornecedor200.com.br',
              'uf' => 'RS',
              'email' => 'contato@fornecedor200.com.br'
        ]);



        // DESTA FORMA NÃO SERÁ POPULADO CREATED_AT NEM UPDATED_AT 
        
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 300',
            'site' => 'fornecedor300.com.br',
            'uf' => 'SP',
            'email' => 'contato@fornecedor300.com.br'
        ]);
    }
}
