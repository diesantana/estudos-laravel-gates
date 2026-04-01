<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
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
}
