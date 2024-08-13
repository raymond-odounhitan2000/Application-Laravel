<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:255',
        ]);

        // Définir la catégorie par défaut si elle n'est pas fournie
        $validated['category'] = $validated['category'] ?? 'Sans catégorie';

        // Sauvegarder l'article
        $article = new Article($validated);
        $article->user_id = Auth::id(); // Associe l'article à l'utilisateur connecté
        $article->save();

        return redirect()->route('articles.create')->with('status', 'Article created successfully!');
    }

    public function index(Request $request)
    {
        // Récupérer la méthode de tri (date ou catégorie) depuis la requête
        $sortBy = $request->input('sort_by', 'created_at'); // Par défaut trier par date de création

        // Validation du paramètre de tri
        if (!in_array($sortBy, ['created_at', 'category']))
        {
            $sortBy = 'created_at';
        }

        // Récupérer les articles avec pagination
        $articles = Article::orderBy($sortBy)->paginate(12); // 10 articles par page

        return view('articles.index', compact('articles'));
    }
}
