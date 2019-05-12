<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Article;
use App\Entities\Category;
use App\Entities\CategoryArticle;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index()
    {
        $objArticle = new Article();
        $articles = $objArticle->get();
        return view('admin.articles.index', ['articles' => $articles]);
    }

    public function addArticle()
    {
        $objCategory = new Category();
        $categories = $objCategory->get();


        return view('admin.articles.add', ['categories' => $categories]);
    }

    public function addRequestArticle(ArticleRequest $request)
    {
        $objArticle = new Article();
        $objCategoryArticle = new CategoryArticle();

        $objArticle = $objArticle->create([
            'title' => $request->input('title'),
            'short_text' => $request->input('short_text'),
            'full_text' => $request->input('full_text'),
        ]);

        if ($objArticle) {
            foreach ($request->input('categories') as $category_id) {
                $category_id = (int)$category_id;
                $objCategoryArticle = $objCategoryArticle->create([
                    'category_id' => $category_id,
                    'article_id' => $objArticle->id,
                ]);
            }
            return redirect()->route('articles')->with('success', 'Пост успешно добавлен');
        }
        return back()->with('error', 'Не удалось добавить пост');
    }

    public function editArticle(int $id)
    {
        $objCategory = new Category();
        $categories = $objCategory->get();
        $objArticle = Article::find($id);
        if (!$objArticle) {
            return abort(404);
        }

        $mainCategories = $objArticle->categories;
        $arrCategories = [];
        foreach ($mainCategories as $category) {
            $arrCategories[] = $category->id;
        }

        return view('admin.articles.edit', [
            'categories' => $categories,
            'article' => $objArticle,
            'arrCategories' => $arrCategories,
        ]);
    }

    public function editRequestArticle(int $id, ArticleRequest $request)
    {
        $objArticle = Article::find($id);
        if (!$objArticle) {
            return abort(404);
        }

        $objArticle->title = $request->input('title');
        $objArticle->short_text = $request->input('short_text');
        $objArticle->full_text = $request->input('full_text');

        if($objArticle->save()){
            $objArticleCategory = new CategoryArticle();
            $objArticleCategory->where('article_id', $objArticle->id)->delete();

            $arrCategory = $request->input('categories');
            if(is_array($arrCategory)){
                foreach ($arrCategory as $category) {
                    $objArticleCategory->create([
                       'category_id' => $category,
                       'article_id'=> $objArticle->id,
                    ]);
                }
            }
            return redirect()->route('articles')->with('success', 'Пост успешно обновлен');
        }
        return back()->with('error', 'Не удалось изменить пост');
    }

    public function deleteArticle(Request $request)
    {
        if ($request->ajax()) {
            $id = (int)$request->input('id');
            $objArticle = new Article();

            $objArticle->where('id', $id)->delete();

            echo "succes";
        }
    }
}
