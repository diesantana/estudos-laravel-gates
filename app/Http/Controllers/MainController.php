<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class MainController extends Controller
{
    /**
     * Renderiza a view dashboard com os posts
     */
    public function index(): View
    {
        // Busca os posts
        $posts = Post::with('user')->get();
        return view('dashboard', ['posts' => $posts]);
    }

    /**
     * Renderiza o formulário e criação de posts
     */
    public function create()
    {
        // Verifica se o user tem permissão
        if (! Gate::allows('create-post')) {
            abort(403, 'Você não tem permissão para criar um post');
        }

        return view('posts.create');
    }

    /**
     *  Salva o novo post
     */
    public function store(Request $request)
    {
        // Validação
        $request->validate(
            [
                'title' => 'required|min:3|max:100',
                'body' => 'required|min:3|max:1000',
            ],
            [
                'title.required' => 'O título é obrigatório',
                'title.min' => 'O título não pode ser menor que 3 caracteres',
                'title.max' => 'O título não pode ser maior que 100 caracteres',
                'body.required' => 'O conteúdo do post é obrigatório',
                'body.min' => 'O conteúdo do post não pode ser menor que 3 caracteres',
                'body.max' => 'O  conteúdo do post não pode ser maior que 1000 caracteres',
            ]
        );

        // Verifica se o user tem permissão
        if (! Gate::allows('create-post')) {
            abort(403, 'Você não tem permissão para criar um post');
        }

        // Salva o post
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::user()->id
        ]);

        // redireciona para o dashboard
        return redirect()->route('dashboard');
    }

    /**
     * Deleta um post
     */
    public function destroy(int $id)
    {
        // Lança um erro 404 automaticamente se o post não for encontrado
        $post = Post::findOrFail($id);

        // Verifica se o user tem permissão
        if (! Gate::allows('delete-post', $post)) {
            abort(403, 'Você não tem permissão para deletar este post');
        }

        // deleta o post
        $post->delete();

        return redirect()->route('dashboard');
        // redirecionando com uma mensagem
        // return redirect()->route('dashboard')->with('success', 'Item excluído com sucesso');
    }
}
