<?php

namespace App\Http\Controllers;

use App\Entities\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function addComment(Request $request)
    {
        $comment = $request->input('comment');
        $article_id = (int)$request->input('article_id');
        $user_id = auth()->user()->id;


        if (Comment::create([
            'article_id' => $article_id,
            'user_id' => $user_id,
            'comment' => $comment,
        ])) {
            return back()->with('success', 'Комментарий успешно добавлен');
        }
        return back()->with('error', 'Не удалось добавить комментарий');
    }
}
