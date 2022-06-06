<?php
/*!

 =========================================================
 * Material Blog PRO Laravel - v1.0.0
 =========================================================

 * Product Page: https://www.creative-tim.com/product/material-dashboard-pro-laravel
 * Copyright 2019 Creative Tim (http://www.creative-tim.com) & UPDIVISION (http://www.updivision.com)

 * Designed by www.invisionapp.com Coded by www.creative-tim.com & www.updivision.com

 =========================================================

 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

 */

namespace App\Http\Controllers\Blog;

use App\Article;
use App\Comment;
use App\Exhibition;
use App\Sector;
use App\Http\Requests\CommentsRequest;
use Illuminate\Support\Str;

class ArticleController extends BlogController
{
    /**
     * Show all articles
     * @param App\Article $article -> The details about the article
     * @return \Illuminate\View\View
     */
    public function index(Article $model)
    {
        $curdate = date('Y-m-d');

        $articles = Exhibition::join('companies','companies.id','=','exhibitions.Organiser')->where('exhibitions.StartDate','<=',$curdate)->where('exhibitions.EndDate','>=',$curdate)->select('exhibitions.*','companies.CommonName','companies.slug as companyslug','companies.Logo')->orderBy('exhibitions.created_at', 'desc')->paginate(10);

        return view('blog.all_articles', ['articles' => $articles]);
    }

    /**
     * Show article
     * @param App\Article $article -> The details about the article
     * @param App\Comment $modelComment -> The details about the comment
     * @return \Illuminate\View\View
     */
    public function show(Article $article, Comment $modelComment)
    {
        $moreArticles = $article->published()
            ->publishedUntilToday()
            ->category($article->category_id)
            ->author($article->author_id)
            ->differentFromCurrentArticle($article->id)
            ->orderBy('publish_date', 'desc')
            ->take(3)
            ->get();

        return view('blog.show', compact(['article', 'moreArticles']));
    }

    /**
     * Store an article
     * @param \App\Http\Requests\CommentsRequest $request
     * @param App\Comment $model -> The details about the comment
     * @param App\Article $article -> The details about the article
     * @return \Illuminate\View\View
     */
    public function store(CommentsRequest $request, Comment $model, Article $article)
    {
        $model = $model->create($request->merge([
            'author_id' => auth()->user()->id,
            'article_id' => $article->id
        ])->all());

        return redirect()->to(url()->previous() . '#comments');
    }

    public function industry(Exhibition $model)
    {
        $slug = @explode('/',$_SERVER['REQUEST_URI']);

        $slug = $slug[2];

        $industries = Sector::where('slug','=',$slug)->orderBy('created_at', 'desc')->first();

        $articles = Exhibition::join('companies','companies.id','=','exhibitions.Organiser')->whereRaw("find_in_set(".$industries->id.",exhibitions.Sector)")->select('exhibitions.*','companies.CommonName','companies.slug as companyslug','companies.Logo')->orderBy('exhibitions.created_at', 'desc')->paginate(10);

        /*$exhibitions = Exhibition::where('Sector','=',$industries->id)->orderBy('created_at', 'desc')->first();

        $participants = Participant::join('companies','companies.id','=','participants.Company')->where('participants.Exhibition','=',$exhibitions->id)->select('companies.*','participants.*')->orderBy('participants.created_at', 'desc')->get();*/

        return view('blog.all_articles', ['articles' => $articles]);
    }
}
