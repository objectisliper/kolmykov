<?php

namespace App\Http\Controllers;


use App\Entities\Article;
use App\Entities\CategoryArticle;
use App\Entities\Category;
use App\Entities\Tag;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::with(['categories', 'tags'])->orderBy('id', 'desc')->paginate(10);
        return view('index', ['articles' => $articles]);
    }

    public function showArticle(string $category, int $id, $slug)
    {
        $objArticle = Article::find($id);
        if (!$objArticle) {
            return abort(404);
        }
        $comments = $objArticle->comments()->where('status', 1)->get();


        return view('show_article', ['article' => $objArticle, 'comments' => $comments]);
    }

    public function showCategory(int $id)
    {
        $category = Category::find($id);
        $articles = Article::whereHas('categories', function($query) use ($id) {
            $query->where('categories.id', $id);
        })->get();

        return view('show_articles_category', ['category' => $category, 'articles' => $articles]);
    }

    public function showTag(int $id)
    {
        $tag = Tag::find($id);
        $articles = Article::whereHas('tags', function($query) use ($id) {
            $query->where('tags.id', $id);
        })->get();

        return view('show_articles_tag', ['tag' => $tag, 'articles' => $articles]);
    }

}