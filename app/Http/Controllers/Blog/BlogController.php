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

use App\Http\Controllers\Controller;
use App\Category;
use App\User;
use App\Sector;
use App\Tag;
use App\Article;
use Illuminate\Support\Facades\View;

class BlogController extends Controller
{
    function __construct() {
        $navCategories = Sector::take(8)->get();
        $footerCategories = Article::take(5)->orderBy('id','DESC')->get();//Category::has('articles', '>', '0')->take(5)->get();
        $footerAuthors = Sector::take(8)->get();
        $footerTags = Tag::take(15)->get();
        View::share([
            'navCategories' => $navCategories,
            'footerCategories' => $footerCategories,
            'footerAuthors' => $footerAuthors,
            'footerTags' => $footerTags
        ]);
    }

    public function blogs()
    {
        $articles = Article::select('*')->orderBy('id','DESC')->get();

        return view('blog.all_blog', ['articles' => $articles]);
    }
}
