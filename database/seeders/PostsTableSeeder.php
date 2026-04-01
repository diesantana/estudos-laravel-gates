<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'user_id' => 1,
                'title' => 'Primeiro post do Bob Admin',
                'body' => 'Este é o primeiro post do administrador do sistema. Sejam bem-vindos á comunidade'
            ],
            [
                'user_id' => 1,
                'title' => 'Uma nota importante',
                'body' => 'Todos os usuários devem manter o respeito mútuo e a cordialidade nas interações.'
            ],
            [
                'user_id' => 2,
                'title' => 'Olá a todos!',
                'body' => 'O meu nome é Alice Purple, acabei de me registrar, e estou muito feliz por fazer parte desta comunidade'
            ],
            [
                'user_id' => 1,
                'title' => 'Bem-vindo Alice Purple',
                'body' => 'Muito obrigado por se juntar a nós, Alice. Espero que você se sinta em casa.'
            ],
            [
                'user_id' => 2,
                'title' => 'Muito obrigado!',
                'body' => 'Obrigado, Bob. Estou muito feliz por fazer parte desta comunidade.'
            ],
        ];

        DB::table('posts')->insert($posts);
    }
}
