<?php

namespace App\Http\Controllers\Blog;


class AboutusController extends BlogController
{
    /**
     * Show all articles
     * @param App\Article $article -> The details about the article
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('blog.about_us');
    }
}
