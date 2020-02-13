<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    // Get list of articles
    public function index()
    {
        $articles = Article::getArticles();
        return $articles;
    }
    // Add article
    public function store(Request $request)
    {
        if($request->isMethod('post'))
            return Article::addArticle($request->input());
        else
            return Article::editArticle($request->input());
    }
    // Delete article
    public function destroy($id)
    {
        return Article::deleteArticle($id);
    }
}
