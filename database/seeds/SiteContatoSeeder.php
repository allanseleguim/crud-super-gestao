<?php

use Illuminate\Database\Seeder;

// Importar model 
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Instanciar model 


      // $contato = new SiteContato();
      // $contato->nome = 'Sistema SG';
      // $contato->telefone = '15 9999-9999';
      // $contato->email = 'contato@sg.com.br';
      // $contato->motivo_contato = 1;
      // $contato->mensagem = 'Seja bem vindo ao sistema Super Gestão!';
      // $contato->save();

      factory(SiteContato::class, 100)->create();
    }
}
