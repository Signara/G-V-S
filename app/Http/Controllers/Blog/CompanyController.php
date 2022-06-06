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
use App\Company;

class CompanyController extends BlogController
{
    /**
     * Show all articles
     * @param App\Article $article -> The details about the article
     * @return \Illuminate\View\View
     */
    public function index(Company $model)
    {
        $slug = @explode('/',$_SERVER['REQUEST_URI']);

        $slug = $slug[2];

        $companies = Company::where('slug','=',$slug)->orderBy('created_at', 'desc')->first();

        return view('blog._partials.company', ['companies' => $companies]);
    }
}
