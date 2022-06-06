<?php
/*

 =========================================================
 * Material Blog PRO Laravel - v1.0.0
 =========================================================

 * Product Page: https://www.creative-tim.com/product/material-dashboard-pro-laravel
 * Copyright 2019 Creative Tim (http://www.creative-tim.com) & UPDIVISION (http://www.updivision.com)

 * Designed by www.invisionapp.com Coded by www.creative-tim.com & www.updivision.com

 =========================================================

 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

 */
namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Sector;
use App\Http\Requests\CategoryRequest;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Category::class);
    }

    /**
     * Display a listing of the categories
     *
     * @param \App\Category  $model
     * @return \Illuminate\View\View
     */
    public function index(Sector $sector)
    {
        $categories = Category::where('IndustryId','=',$sector->id)->select('*')->get();

        return view('sectors.categories.index', ['categories' => $categories , 'sector' => $sector]);
    }

    /**
     * Show the form for creating a new category
     *
     * @return \Illuminate\View\View
     */
    public function create(Sector $sector)
    {
        return view('sectors.categories.create',compact('sector'));
    }

    /**
     * Store a newly created category in storage
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @param  \App\Category  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Sector $sector, CategoryRequest $request, Category $model)
    {
        $model->create($request->merge([
            'IndustryId' =>$sector->id,
            'picture' =>$request->photo ? $request->file('photo')->store('categories', 'public') : null,
        ])->all());
        return redirect()->route('category.index', $sector)->withStatus(__('Category successfully created.'));
    }

    /**
     * Show the form for editing the specified category
     *
     * @param  \App\Category  $category
     * @return \Illuminate\View\View
     */
    public function edit(Sector $sector, Category $category)
    {
        return view('sectors.categories.edit', compact('sector','category'));
    }

    /**
     * Update the specified category in storage
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Sector $sector, CategoryRequest $request, Category $category)
    {
        $category->update($request->merge([
                'picture' => $request->photo ? $request->photo->store('categories', 'public') : null,
            ])->except([$request->hasFile('photo') ? '' : 'picture']));

        return redirect()->route('category.index', $sector)->withStatus(__('Category successfully updated.'));
    }

    /**
     * Remove the specified category from storage
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Sector $sector, Category $category)
    {
        if (!$category->articles->isEmpty()) {
            return redirect()->route('category.index')->withErrors(__('This category has article attached and can\'t be deleted.'));
        }

        $category->delete();

        return redirect()->route('category.index', $sector)->withStatus(__('Category successfully deleted.'));
    }
}
