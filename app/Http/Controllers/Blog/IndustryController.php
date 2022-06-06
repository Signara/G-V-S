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

use App\Sector;
use Illuminate\Support\Str;

class IndustryController extends BlogController
{
    /**
     * Show all sector
     * @param App\Sector $article -> The details about the sector
     * @return \Illuminate\View\View
     */
    public function index(Sector $model)
    {
        $articles = Sector::orderBy('created_at', 'desc')->paginate(10);

        return view('blog.all_industries', ['articles' => $articles]);
    }
}
