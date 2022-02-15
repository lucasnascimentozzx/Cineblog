<?php

namespace Database\Seeders;

use App\Models\Artigo;
use App\Models\Categoria;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Usuario::factory(15)->create();
        \App\Models\Artigo::factory(15)->create();

        Usuario::create([
            'name' => 'Rafael Jaques',
            'email' => 'rafael.jaques@bento.ifrs.edu.br',
            'username' => 'rafajaques',
            'password' => '123',
            'admin' => false
        ]);
        Usuario::create([
            'name' => 'Lucas Nascimento',
            'email' => 'lucas310104@hotmail.com',
            'username' => 'lucasnascimento',
            'password' => '123',
            'admin' => true
        ]);


        $franquia_id = Categoria::create([
            'nome' => 'Franquia'
        ])->id;

        Categoria::insert([
            ['nome' => 'Ação'],
            ['nome' => 'Aventura'],
            ['nome' => 'Biográfico'],
            ['nome' => 'Comédia'],
            ['nome' => 'Comédia dramática'],
            ['nome' => 'Comédia romântica'],
            ['nome' => 'Histórico'],
            ['nome' => 'Drama']
        ]);

        Categoria::insert([
            ['nome' => 'Universo Marvel' , 'categoria_pai_id' => $franquia_id],
            ['nome' => 'Harry Potter' , 'categoria_pai_id' => $franquia_id],
            ['nome' => 'James Bond' , 'categoria_pai_id' => $franquia_id],
            ['nome' => 'O Senhor dos Anéis' , 'categoria_pai_id' => $franquia_id],
            ['nome' => 'Star Wars' , 'categoria_pai_id' => $franquia_id],
            ['nome' => 'Homem Aranha' , 'categoria_pai_id' => $franquia_id],
            ['nome' => 'Veloses & Furiosos' , 'categoria_pai_id' => $franquia_id],
            ['nome' => 'Transformers' , 'categoria_pai_id' => $franquia_id],
            ['nome' => 'Piratas do Caribe' , 'categoria_pai_id' => $franquia_id],
            ['nome' => 'Batman' , 'categoria_pai_id' => $franquia_id],
        ]);


        
    }
}
