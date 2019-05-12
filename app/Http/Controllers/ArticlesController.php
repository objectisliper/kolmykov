<?php

namespace App\Http\Controllers;


use App\Entities\Article;
//use App\Entities\CategoryArticle;

class ArticlesController extends Controller
{
    public function index()
    {
        $objArticle = new Article();
//        $objCategory = new CategoryArticle();
        $articles = $objArticle->orderBy('id', 'desc')->paginate(10);
//        $categories = $objCategory;
        return view('index', ['articles' => $articles]);
    }

    public function showArticle(int $id, $slug)
    {
        $objArticle = Article::find($id);
        if(!$objArticle){
          return abort(404);
        }
        return view('show_article', ['article' => $objArticle]);
    }
}