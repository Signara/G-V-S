<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', 'API\LoginController@login')->name('login');
Route::post('exhibitionList', 'API\ExhibitionController@exhibitionList')->name('exhibitionList');
Route::post('userCreate', 'API\LoginController@userCreate')->name('userCreate');
Route::post('companyCreate', 'API\CompanyController@companyCreate')->name('companyCreate');
Route::post('companyList', 'API\CompanyController@companyList')->name('companyList');
Route::post('verifyOTP', 'API\LoginController@verifyOTP')->name('verifyOTP');
Route::post('getOTP', 'API\LoginController@getOTP')->name('getOTP');

Route::middleware('auth:api')->group( function () {
    Route::post('createLayout', 'API\LayoutController@createLayout')->name('createLayout');
    Route::post('updateLayout', 'API\LayoutController@updateLayout')->name('updateLayout');
    Route::post('deleteLayout', 'API\LayoutController@deleteLayout')->name('deleteLayout');
    Route::post('exhibitionDetail', 'API\ExhibitionController@exhibitionDetail')->name('exhibitionDetail');
    Route::post('hallList', 'API\HallController@hallList')->name('hallList');
    Route::post('participantList', 'API\ParticipantController@participantList')->name('participantList');
    Route::post('companyDetail', 'API\CompanyController@companyDetail')->name('companyDetail');
    Route::post('layoutList', 'API\LayoutController@layoutList')->name('layoutList');
    Route::post('modelDetail', 'API\ModelController@modelDetail')->name('modelDetail');
    Route::post('modelList', 'API\ModelController@modelList')->name('modelList');
    Route::post('saveCharacter', 'API\LoginController@saveCharacter')->name('saveCharacter');
    Route::post('getUserAccessType', 'API\ExhibitionController@getUserAccessType')->name('getUserAccessType');
    Route::post('productList', 'API\ProductController@productList')->name('productList');
    Route::post('promotionalMaterialList', 'API\PromotionalMaterialController@promotionalMaterialList')->name('promotionalMaterialList');
    Route::post('promotionalMaterialCreate', 'API\PromotionalMaterialController@promotionalMaterialCreate')->name('promotionalMaterialCreate');
    Route::post('visitorCreate', 'API\VisitorController@visitorCreate')->name('visitorCreate');
    Route::post('communicationCreate', 'API\CommunicationController@communicationCreate')->name('communicationCreate');
    Route::post('communicationList', 'API\CommunicationController@communicationList')->name('communicationList');
    Route::post('companyRepresentative', 'API\CompanyController@companyRepresentative')->name('companyRepresentative');
    Route::post('callStatusCreateUpdate', 'API\CallStatusController@callStatusCreateUpdate')->name('callStatusCreateUpdate');
    Route::post('callNotification', 'API\CallStatusController@callNotification')->name('callNotification');
    Route::post('userDetails', 'API\LoginController@userDetails')->name('userDetails');
    Route::post('logout', 'API\LoginController@logout')->name('logout');
    Route::post('changePassword', 'API\LoginController@changePassword')->name('changePassword');
    Route::post('editProfilePic', 'API\LoginController@editProfilePic')->name('editProfilePic');
    Route::post('visitorList', 'API\VisitorController@visitorList')->name('visitorList');
    Route::post('createInquiry', 'API\LoginController@createInquiry')->name('createInquiry');
    Route::post('updateUserDetail', 'API\LoginController@updateUserDetail')->name('updateUserDetail');
});

Route::get('callStatus', 'API\CallStatusController@callStatus')->name('callStatus');

