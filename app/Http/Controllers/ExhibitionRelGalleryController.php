<?php

namespace App\Http\Controllers;

use App\Exhibition;
use App\ExhibitionRelGallery;
use Illuminate\Http\Request;
use App\Http\Requests\ExhibitionRelGalleryRequest;
use DB;
use Illuminate\Support\Str;

class ExhibitionRelGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Exhibition $exhibition)
    {
        $exhibitionrelgalleries = ExhibitionRelGallery::join('exhibitions','exhibitions.id','=','exhibition_rel_galleries.ExhibitionId')->select('exhibition_rel_galleries.*','exhibitions.Name')->get();

        return view('exhibitions.exhibitionrelgallery.index', ['exhibitionrelgalleries' => $exhibitionrelgalleries , 'exhibition' => $exhibition]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Exhibition $exhibition)
    {
        return view('exhibitions.exhibitionrelgallery.create',compact('exhibition'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Exhibition $exhibition, ExhibitionRelGalleryRequest $request, ExhibitionRelGallery $model)
    {
        $exhibitionrelgalleris = $model->create($request->merge([
            'gallery' => $request->gallary ? $request->gallary->store('exhibitionrelgallery', 'public') : null,
            'ExhibitionId' =>$exhibition->id
        ])->all());

        return redirect()->route('exhibitionRelGallery.index', $exhibition)->withStatus(__('ExhibitionRelGallery successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function show(ExhibitionRelGallery $exhibitionrelgallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function edit(Exhibition $exhibition, ExhibitionRelGallery $exhibitionrelgallery)
    {
        return view('exhibitions.exhibitionrelgallery.edit', compact('exhibition','exhibitionrelgallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function update(Exhibition $exhibition, ExhibitionRelGalleryRequest $request, ExhibitionRelGallery $exhibitionrelgallery)
    {
        $exhibitionrelgallery->update(
            $request->merge([
                'gallery' => $request->gallary ? $request->gallary->store('exhibitionrelgallery', 'public') : $exhibitionrelgallery->gallery,
                'ExhibitionId' =>$exhibition->id
            ])->all()
        );

        return redirect()->route('exhibitionRelGallery.index', $exhibition)->withStatus(__('ExhibitionRelGallery successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exhibition $exhibition, ExhibitionRelGallery $exhibitionrelgallery)
    {
        $exhibitionrelgallery->delete();

        return redirect()->route('exhibitionRelGallery.index', $exhibition)->withStatus(__('ExhibitionRelGallery successfully deleted.'));
    }
}
