<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('dashboard', 'ExamplePagesController@dashboard')->name('dashboard');
Route::get('pricing', 'ExamplePagesController@pricing')->name('page.pricing');
Route::get('lock', 'ExamplePagesController@lock')->name('page.lock');
Route::get('error', ['as' => 'page.error', 'uses' => 'ExamplePagesController@error']);

Route::namespace('Blog')->group(function () {
    Route::get('article/{article}', 'ArticleController@show')->name('blog.article.show');
    Route::post('comments/{article}', 'CommentsController@store')->name('blog.comments.store');
    Route::get('category/{category}', 'CategoryController@index')->name('blog.category');
    Route::get('tag/{tag}', 'TagController@index')->name('blog.tag');
    Route::get('author/{user}', 'AuthorController@index')->name('blog.author');
    Route::get('all_exhibitions', 'ArticleController@index')->name('blog.article.index');
    Route::get('search', 'SearchController@index')->name('blog.search');
    Route::post('article/{article}', 'ArticleController@store')->name('blog.article.store');
    Route::post('newsletter', 'NewsletterController@store')->name('blog.newsletter.store');
    Route::get('company/{company}', 'CompanyController@index')->name('blog.company.index');
    Route::get('exhibition/{exhibition}', 'ExhibitionController@index')->name('blog.exhibition.index');
    Route::get('about_us', 'AboutusController@index')->name('blog.aboutus.index');
    Route::get('all_blogs', 'BlogController@blogs')->name('blog.blogs');
    Route::get('indstryRelexhibition/{exhibition}', 'ArticleController@industry')->name('blog.exhibition.industry');
    Route::get('contact_us', 'ContactusController@index')->name('blog.contactus.index');
    Route::post('/', 'ContactusController@store')->name('blog.contactus.store');
    Route::get('all_industries', 'IndustryController@index')->name('blog.industry.index');
});

Route::group(['middleware' => 'auth','prefix'=>'admin'], function () {
    Route::resource('category', 'CategoryController', ['except' => ['show']]);
    Route::resource('tag', 'TagController', ['except' => ['show']]);
    Route::resource('article', 'ArticleController', ['except' => ['show']]);
    Route::resource('role', 'RoleController', ['except' => ['show', 'destroy']]);
    Route::resource('user', 'UserController', ['except' => ['show']]);

    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

    Route::get('rtl-support', ['as' => 'page.rtl-support', 'uses' => 'ExamplePagesController@rtlSupport']);
    Route::get('timeline', ['as' => 'page.timeline', 'uses' => 'ExamplePagesController@timeline']);
    Route::get('widgets', ['as' => 'page.widgets', 'uses' => 'ExamplePagesController@widgets']);
    Route::get('charts', ['as' => 'page.charts', 'uses' => 'ExamplePagesController@charts']);
    Route::get('calendar', ['as' => 'page.calendar', 'uses' => 'ExamplePagesController@calendar']);

    Route::get('buttons', ['as' => 'page.buttons', 'uses' => 'ComponentPagesController@buttons']);
    Route::get('grid-system', ['as' => 'page.grid', 'uses' => 'ComponentPagesController@grid']);
    Route::get('panels', ['as' => 'page.panels', 'uses' => 'ComponentPagesController@panels']);
    Route::get('sweet-alert', ['as' => 'page.sweet-alert', 'uses' => 'ComponentPagesController@sweetAlert']);
    Route::get('notifications', ['as' => 'page.notifications', 'uses' => 'ComponentPagesController@notifications']);
    Route::get('icons', ['as' => 'page.icons', 'uses' => 'ComponentPagesController@icons']);
    Route::get('typography', ['as' => 'page.typography', 'uses' => 'ComponentPagesController@typography']);

    Route::get('regular-tables', ['as' => 'page.regular_tables', 'uses' => 'TablePagesController@regularTables']);
    Route::get('extended-tables', ['as' => 'page.extended_tables', 'uses' => 'TablePagesController@extendedTables']);
    Route::get('datatable-tables', ['as' => 'page.datatable_tables', 'uses' => 'TablePagesController@datatableTables']);

    Route::get('regular-form', ['as' => 'page.regular_forms', 'uses' => 'FormPagesController@regularForms']);
    Route::get('extended-form', ['as' => 'page.extended_forms', 'uses' => 'FormPagesController@extendedForms']);
    Route::get('validation-form', ['as' => 'page.validation_forms', 'uses' => 'FormPagesController@validationForms']);
    Route::get('wizard-form', ['as' => 'page.wizard_forms', 'uses' => 'FormPagesController@wizardForms']);

    Route::get('google-maps', ['as' => 'page.google_maps', 'uses' => 'MapPagesController@googleMaps']);
    Route::get('fullscreen-maps', ['as' => 'page.fullscreen_maps', 'uses' => 'MapPagesController@fullscreenMaps']);
    Route::get('vector-maps', ['as' => 'page.vector_maps', 'uses' => 'MapPagesController@vectorMaps']);

    Route::get('sector', 'SectorController@index')->name('sector.index');
    Route::post('sector', 'SectorController@store')->name('sector.store');
    Route::get('sector/create', 'SectorController@create')->name('sector.create');

    Route::group(['prefix' => 'sector/{sector}'], function () {
        Route::get('edit', 'SectorController@edit')->name('sector.edit');
        Route::put('/', 'SectorController@update')->name('sector.update');
        Route::delete('/', 'SectorController@destroy')->name('sector.destroy');
    });

    Route::group(['prefix' => 'category/{sector}'], function () {
        Route::get('category', 'CategoryController@index')->name('category.index');
        Route::post('category', 'CategoryController@store')->name('category.store');
        Route::get('category/create', 'CategoryController@create')->name('category.create');
    });

    Route::group(['prefix' => 'category/{sector}/{category}'], function () {
        Route::get('edit', 'CategoryController@edit')->name('category.edit');
        Route::put('/', 'CategoryController@update')->name('category.update');
        Route::delete('/', 'CategoryController@destroy')->name('category.destroy');
    });

    Route::get('company', 'CompanyController@index')->name('company.index');
    Route::post('company', 'CompanyController@store')->name('company.store');
    Route::get('company/create', 'CompanyController@create')->name('company.create');
    Route::get('company/getCategories', 'CompanyController@getCategories')->name('company.getCategories');

    Route::group(['prefix' => 'company/{company}'], function () {
        Route::get('edit', 'CompanyController@edit')->name('company.edit');
        Route::put('/', 'CompanyController@update')->name('company.update');
        Route::delete('/', 'CompanyController@destroy')->name('company.destroy');
    });

    Route::get('model', 'ModelsController@index')->name('model.index');
    Route::post('model', 'ModelsController@store')->name('model.store');
    Route::get('model/create', 'ModelsController@create')->name('model.create');

    Route::group(['prefix' => 'model/{models}'], function () {
        Route::get('edit', 'ModelsController@edit')->name('model.edit');
        Route::put('/', 'ModelsController@update')->name('model.update');
        Route::delete('/', 'ModelsController@destroy')->name('model.destroy');
    });

    Route::get('package', 'PackageController@index')->name('package.index');
    Route::post('package', 'PackageController@store')->name('package.store');
    Route::get('package/create', 'PackageController@create')->name('package.create');

    Route::group(['prefix' => 'package/{package}'], function () {
        Route::get('edit', 'PackageController@edit')->name('package.edit');
        Route::put('/', 'PackageController@update')->name('package.update');
        Route::delete('/', 'PackageController@destroy')->name('package.destroy');
    });

    Route::get('exhibition', 'ExhibitionController@index')->name('exhibition.index');
    Route::post('exhibition', 'ExhibitionController@store')->name('exhibition.store');
    Route::get('exhibition/create', 'ExhibitionController@create')->name('exhibition.create');

    Route::group(['prefix' => 'exhibition/{exhibition}'], function () {
        Route::get('edit', 'ExhibitionController@edit')->name('exhibition.edit');
        Route::put('/', 'ExhibitionController@update')->name('exhibition.update');
        Route::delete('/', 'ExhibitionController@destroy')->name('exhibition.destroy');
    });

    Route::group(['prefix' => 'hall/{exhibition}'], function () {
        Route::get('hall', 'HallController@index')->name('hall.index');
        Route::post('hall', 'HallController@store')->name('hall.store');
        Route::get('hall/create', 'HallController@create')->name('hall.create');
    });

    Route::group(['prefix' => 'hall/{exhibition}/{hall}'], function () {
        Route::get('edit', 'HallController@edit')->name('hall.edit');
        Route::put('/', 'HallController@update')->name('hall.update');
        Route::delete('/', 'HallController@destroy')->name('hall.destroy');
    });

    Route::get('participant/getPackages', 'ParticipantController@getPackages')->name('participant.getPackages');
    Route::get('participant/getProducts', 'ParticipantController@getProducts')->name('participant.getProducts');
    Route::get('participant/getUsers', 'ParticipantController@getUsers')->name('participant.getUsers');
    Route::group(['prefix' => 'participant/{exhibition}'], function () {
        Route::get('participant', 'ParticipantController@index')->name('participant.index');
        Route::post('participant', 'ParticipantController@store')->name('participant.store');
        Route::get('participant/create', 'ParticipantController@create')->name('participant.create');
    });

    Route::group(['prefix' => 'participant/{exhibition}/{participant}'], function () {
        Route::get('edit', 'ParticipantController@edit')->name('participant.edit');
        Route::put('/', 'ParticipantController@update')->name('participant.update');
        Route::delete('/', 'ParticipantController@destroy')->name('participant.destroy');
    });

    Route::group(['prefix' => 'exhibitionRelGallery/{exhibition}'], function () {
        Route::get('exhibitionRelGallery', 'ExhibitionRelGalleryController@index')->name('exhibitionRelGallery.index');
        Route::post('exhibitionRelGallery', 'ExhibitionRelGalleryController@store')->name('exhibitionRelGallery.store');
        Route::get('exhibitionRelGallery/create', 'ExhibitionRelGalleryController@create')->name('exhibitionRelGallery.create');
    });

    Route::group(['prefix' => 'exhibitionRelGallery/{exhibition}/{exhibitionrelgallery}'], function () {
        Route::get('edit', 'ExhibitionRelGalleryController@edit')->name('exhibitionRelGallery.edit');
        Route::put('/', 'ExhibitionRelGalleryController@update')->name('exhibitionRelGallery.update');
        Route::delete('/', 'ExhibitionRelGalleryController@destroy')->name('exhibitionRelGallery.destroy');
    });

    Route::get('promotionalmaterial', 'PromotionalMaterialController@index')->name('promotionalmaterial.index');
    Route::post('promotionalmaterial', 'PromotionalMaterialController@store')->name('promotionalmaterial.store');
    Route::get('promotionalmaterial/create', 'PromotionalMaterialController@create')->name('promotionalmaterial.create');

    Route::group(['prefix' => 'promotionalmaterial/{promotionalmaterial}'], function () {
        Route::get('edit', 'PromotionalMaterialController@edit')->name('promotionalmaterial.edit');
        Route::put('/', 'PromotionalMaterialController@update')->name('promotionalmaterial.update');
        Route::delete('/', 'PromotionalMaterialController@destroy')->name('promotionalmaterial.destroy');
    });

    Route::get('product', 'ProductController@index')->name('product.index');
    Route::post('product', 'ProductController@store')->name('product.store');
    Route::get('product/create', 'ProductController@create')->name('product.create');

    Route::group(['prefix' => 'product/{product}'], function () {
        Route::get('edit', 'ProductController@edit')->name('product.edit');
        Route::put('/', 'ProductController@update')->name('product.update');
        Route::delete('/', 'ProductController@destroy')->name('product.destroy');
    });

    Route::get('visitor', 'VisitorController@index')->name('visitor.index');

    Route::get('communication', 'CommunicationController@index')->name('communication.index');

    Route::get('inquiry', 'InquiryController@index')->name('inquiry.index');
    Route::group(['prefix' => 'inquiry/{inquiry}'], function () {
        Route::delete('/', 'InquiryController@destroy')->name('inquiry.destroy');
    });

  });




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('generateotp', [App\Http\Controllers\HomeController::class, 'generateotp'])->name('generateotp');
Route::get('otp', [App\Http\Controllers\HomeController::class, 'otp'])->name('otp');
Route::post('sendotp', [App\Http\Controllers\HomeController::class, 'sendotp'])->name('sendotp');
Route::group(['prefix' => 'emails/{emails}'], function () {
    Route::post('loginotp', [App\Http\Controllers\HomeController::class, 'loginotp'])->name('loginotp');
});
Route::post('authenticate', [App\Http\Controllers\HomeController::class, 'authenticate'])->name('authenticate');
