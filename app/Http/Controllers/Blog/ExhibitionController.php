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
use App\Exhibition;
use App\ExhibitionRelGallery;
use App\Participant;
use App\Sector;
use App\Company;

class ExhibitionController extends BlogController
{
    /**
     * Show all articles
     * @param App\Article $article -> The details about the article
     * @return \Illuminate\View\View
     */
    public function index(Exhibition $model)
    {
        $slug = @explode('/',$_SERVER['REQUEST_URI']);

        $slug = $slug[2];

        $exhibitions = Exhibition::where('slug','=',$slug)->orderBy('created_at', 'desc')->first();

        $companyId = explode(',', $exhibitions->Organiser);

        $organisers = Company::whereIn('id',$companyId)->get();

        $exhibitionrelgalleries = ExhibitionRelGallery::where('ExhibitionId','=',$exhibitions->id)->get();

        $participants = Participant::join('companies','companies.id','=','participants.Company')->where('participants.Exhibition','=',$exhibitions->id)->select('companies.*','participants.*')->orderBy('participants.created_at', 'desc')->get();

        $sponsors = Participant::where('ParticipantType','=','sponsor')->where('Exhibition','=',$exhibitions->id)->select('participants.*')->orderBy('created_at', 'desc')->get();

        return view('blog._partials.exhibitions', ['exhibitions' => $exhibitions,'organisers' => $organisers,'exhibitionrelgalleries' => $exhibitionrelgalleries,'participants' => $participants,'sponsors' => $sponsors]);
    }
}
