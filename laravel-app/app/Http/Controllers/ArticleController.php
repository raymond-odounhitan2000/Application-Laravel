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
        $validated['category'] = $validated['category'] ?? 'without_category';

        // Sauvegarder l'article
        $article = new Article($validated);
        $article->user_id = Auth::id(); // Associe l'article à l'utilisateur connecté
        $article->save();

        return redirect()->route('articles.create')->with('status', 'Article created successfully!');
    }

    public function index(Request $request)
    {
    $sortBy = $request->input('sort_by', 'created_at');
    if (!in_array($sortBy, ['created_at', 'category']))
        {
            $sortBy = 'created_at';
        }
        //$articles = Article::with('category')->orderBy($sortBy)->paginate(12);
        //return view('articles.show', compact('articles'));
    }

    public function showAll()
    {
        $articles = Article::all();
        return view('articles.show', compact('articles'));
    }
    public function destroy(Article $article)
    {
        // Supprime l'article
        if($article->user_id === Auth::id())
        {
        $article->delete();
        return redirect()->route('home')->with('success', 'Article deleted successfully');
        }
        return redirect(Route('home'))->with('error','Failed to delete this article');
    }
    public function edit(Article $article)
    {
        // Affiche le formulaire de modification avec les données de l'article actuel
        return view('articles.update', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        // Valide les données du formulaire
        $validatedData = $request->validate(
        [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        // Mise à jour des champs de l'article
        $article->title = $validatedData['title'];
        $article->content = $validatedData['content'];
        $article->category = $validatedData['category'] ?? 'Sans catégorie';

        // Si une nouvelle image est téléchargée, gérer son stockage
        if ($request->hasFile('image'))
        {
            $imagePath = $request->file('image')->store('images', 'public');
            $article->image = $imagePath;
        }

        // Sauvegarder les modifications dans la base de données
        $article->save();

        // Redirige l'utilisateur avec un message de succès
        return redirect()->route('home')->with('success', 'Article mis à jour avec succès.');
    }
}
