<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
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

    public function create()
    {
        // Verifica se o user tem permissão
        if (! Gate::allows('create-post')) {
            abort(403, 'Você não tem permissão para criar um post');
        }

        return 'Cria o post';
    }

    public function destroy(int $id)
    {
        // Busca o post
        $post = Post::find($id);

        // Verifica se o user tem permissão
        if (! Gate::allows('delete-post', $post)) {
            abort(403, 'Você não tem permissão para deletar este post');
        }

        return 'Deletar o post';
    }
}
