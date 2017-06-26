<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::group(['middleware' => ['web']], function () {
});

Route::get('addmoney/paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'PaypalController@payWithPaypal',));
Route::post('addmoney/paypal', array('as' => 'addmoney.paypal','uses' => 'PaypalController@postPaymentWithpaypal',));
Route::get('addmoney/paypal', array('as' => 'payment.status','uses' => 'PaypalController@getPaymentStatus',));

Route::get('/', 'UserProfileController@home');
// Route::get('login', 'HomeController@login');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['namespace' => 'Front'], function () {
	Route::get('property-listing', ['as' => 'property', 'uses' => 'PropertyListingController@index']);
	Route::get('user-profile', 'UserProfileController@index');
	Route::get('registration', 'UserProfileController@register');
	Route::post('registration', 'UserProfileController@register');
	Route::post('login-post', 'UserProfileController@loginPost');
	Route::post('update-user', 'UserProfileController@updateUser');
	Route::post('search_property', 'PropertyListingController@search_property');
	Route::get('/', 'UserProfileController@home');
	Route::get('professional-listing', 'ProfessionalListingController@index');
	Route::get('professional/{uid}', 'ProfessionalListingController@detailView');
	Route::get('professional-pay', 'ProfessionalListingController@professionalPay');
});

// common routes
Route::group(['prefix' => 'common'], function () {
	Route::post('fetch_cities', 'CommonController@ajax_fetch_cities');
});

// route group for Admin
Route::group(['prefix' => 'admin'], function () {
	Route::get('/','Admin\AdminController@index');

	// Mortgage Agent
	Route::group(['prefix' => 'mortgage'], function () {
		Route::get('/', 'MortgageController@index');
		Route::get('create','MortgageController@create');
		Route::post('create', 'MortgageController@store');
		Route::get('fetch_mortgage', 'MortgageController@mortgage_datatable');
		Route::get('edit/{uid}', 'MortgageController@edit');
		Route::get('view/{uid}', 'MortgageController@view');
		Route::post('update', 'MortgageController@update');
		Route::post('delete', 'MortgageController@destroy');
		Route::get('download_attach/{file}', 'MortgageController@download_attach');
	});

	// Realtor
	Route::group(['prefix' => 'realtor'], function () {
		Route::get('/', 'RealtorController@index');
		Route::get('create','RealtorController@create');
		Route::post('create', 'RealtorController@store');
		Route::get('fetch_realtor', 'RealtorController@realtor_datatable');
		Route::get('edit/{uid}', 'RealtorController@edit');
		Route::get('view/{uid}', 'RealtorController@view');
		Route::post('update', 'RealtorController@update');
		Route::post('delete', 'RealtorController@destroy');
		Route::get('download_attach/{file}', 'RealtorController@download_attach');
	});

	// Professional
	Route::group(['prefix' => 'professional'], function () {
		Route::get('/', 'ProfessionalController@index');
		Route::get('create','ProfessionalController@create');
		Route::post('create', 'ProfessionalController@store');
		Route::get('fetch_professional', 'ProfessionalController@professional_datatable');
		Route::get('edit/{uid}', 'ProfessionalController@edit');
		Route::get('view/{uid}', 'ProfessionalController@view');
		Route::post('update', 'ProfessionalController@update');
		Route::post('delete', 'ProfessionalController@destroy');
		Route::post('update_password', 'ProfessionalController@UpdatePassword');
		Route::get('download_attach/{file}', 'ProfessionalController@download_attach');
	});

	// Inspector
	Route::group(['prefix' => 'inspector'], function () {
		Route::get('/', 'InspectorController@index');
		Route::get('create','InspectorController@create');
		Route::post('create', 'InspectorController@store');
		Route::get('fetch_inspector', 'InspectorController@inspector_datatable');
		Route::get('edit/{uid}', 'InspectorController@edit');
		Route::get('view/{uid}', 'InspectorController@view');
		Route::post('update', 'InspectorController@update');
		Route::post('delete', 'InspectorController@destroy');
		Route::get('download_attach/{file}', 'InspectorController@download_attach');
	});

	// Appraisers
	Route::group(['prefix' => 'appraisers'], function () {
		Route::get('/', 'AppraisersController@index');
		Route::get('create','AppraisersController@create');
		Route::post('create', 'AppraisersController@store');
		Route::get('fetch_appraisers', 'AppraisersController@appraisers_datatable');
		Route::get('edit/{uid}', 'AppraisersController@edit');
		Route::get('view/{uid}', 'AppraisersController@view');
		Route::post('delete', 'AppraisersController@destroy');
		Route::post('update', 'AppraisersController@update');
		Route::get('download_attach/{file}', 'AppraisersController@download_attach');
	});

	// Contractors
	Route::group(['prefix' => 'contractors'], function () {
		Route::get('/', 'ContractorsController@index');
		Route::get('create','ContractorsController@create');
		Route::post('create', 'ContractorsController@store');
		Route::get('fetch_contractors', 'ContractorsController@contractors_datatable');
		Route::get('edit/{uid}', 'ContractorsController@edit');
		Route::get('view/{uid}', 'ContractorsController@view');
		Route::post('delete', 'ContractorsController@destroy');
		Route::post('update', 'ContractorsController@update');
		Route::get('download_attach/{file}', 'ContractorsController@download_attach');
	});

	// Surveyor
	Route::group(['prefix' => 'surveyor'], function () {
		Route::get('/', 'SurveyorController@index');
		Route::get('create','SurveyorController@create');
		Route::post('create', 'SurveyorController@store');
		Route::get('fetch_surveyor', 'SurveyorController@surveyor_datatable');
		Route::get('edit/{uid}', 'SurveyorController@edit');
		Route::get('view/{uid}', 'SurveyorController@view');
		Route::post('update', 'SurveyorController@update');
		Route::post('delete', 'SurveyorController@destroy');
		Route::get('download_attach/{file}', 'SurveyorController@download_attach');
	});

	// Buyer
	Route::group(['prefix' => 'buyer'], function () {
        Route::get('/', 'BuyerController@index');
        Route::get('create','BuyerController@create');
        Route::post('create', 'BuyerController@store');
        Route::get('fetch_buyers', 'BuyerController@buyers_datatable');
        Route::get('edit/{uid}', 'BuyerController@edit');
        Route::get('view/{uid}', 'BuyerController@view');
        Route::post('update', 'BuyerController@update');
        Route::post('delete', 'BuyerController@destroy');
        Route::get('download_attach/{file}', 'BuyerController@download_attach');
    });

    // Seller
    Route::group(['prefix' => 'seller'], function () {
        Route::get('/', 'SellerController@index');
        Route::get('create','SellerController@create');
        Route::post('create', 'SellerController@store');
        Route::get('fetch_sellers', 'SellerController@sellers_datatable');
        Route::get('edit/{uid}', 'SellerController@edit');
        Route::get('view/{uid}', 'SellerController@view');
        Route::post('update', 'SellerController@update');
        Route::post('delete', 'SellerController@destroy');
        Route::get('download_attach/{file}', 'SellerController@download_attach');
    });

	// Title Company
	Route::group(['prefix' => 'title_company'], function () {
		Route::get('/', 'TitleCompanyController@index');
		Route::get('create','TitleCompanyController@create');
		Route::post('create', 'TitleCompanyController@store');
		Route::get('fetch_title_company', 'TitleCompanyController@title_company_datatable');
		Route::get('edit/{uid}', 'TitleCompanyController@edit');
		Route::get('view/{uid}', 'TitleCompanyController@view');
		Route::post('update', 'TitleCompanyController@update');
		Route::post('delete', 'TitleCompanyController@destroy');
		Route::get('download_attach/{file}', 'TitleCompanyController@download_attach');
	});

	// Closing Attorney
	Route::group(['prefix' => 'closing_attorney'], function () {
		Route::get('/', 'ClosingAttorneyController@index');
		Route::get('create','ClosingAttorneyController@create');
		Route::post('create', 'ClosingAttorneyController@store');
		Route::get('fetch_closing_attorney', 'ClosingAttorneyController@closing_attorney_datatable');
		Route::get('edit/{uid}', 'ClosingAttorneyController@edit');
		Route::get('view/{uid}', 'ClosingAttorneyController@view');
		Route::post('update', 'ClosingAttorneyController@update');
		Route::post('delete', 'ClosingAttorneyController@destroy');
		Route::get('download_attach/{file}', 'ClosingAttorneyController@download_attach');
	});

	// Property Type
	Route::group(['prefix' => 'property_type'], function () {
		Route::get('/', 'PropertyTypeController@index');
		Route::get('create','PropertyTypeController@create');
		Route::post('create', 'PropertyTypeController@store');
		Route::get('fetch_property_type', 'PropertyTypeController@property_type_datatable');
		Route::get('edit/{uid}', 'PropertyTypeController@edit');
		Route::get('view/{uid}', 'PropertyTypeController@view');
		Route::post('update', 'PropertyTypeController@update');
		Route::post('delete', 'PropertyTypeController@destroy');
	});

	// Manage Search
	Route::group(['prefix' => 'manage_search'], function () {

		// Search for property listing
		Route::group(['prefix' => 'property_listing'], function () {
			Route::get('/', 'PropertySearchController@index');
			Route::post('update-params','PropertySearchController@update_search_params');
			Route::post('create', 'PropertySearchController@store');
			Route::get('fetch_property_type', 'PropertySearchController@property_type_datatable');
			Route::get('edit/{uid}', 'PropertySearchController@edit');
			Route::get('view/{uid}', 'PropertySearchController@view');
			Route::post('update', 'PropertySearchController@update');
			Route::post('delete', 'PropertySearchController@destroy');
		});
	});

	// Property
	Route::group(['prefix' => 'property'], function () {
		Route::get('/', 'PropertyController@index');
		Route::get('create','PropertyController@create');
		Route::post('create', 'PropertyController@store');
		Route::get('fetch_property', 'PropertyController@property_datatable');
		Route::get('edit/{uid}', 'PropertyController@edit');
		Route::get('view/{uid}', 'PropertyController@view');
		Route::post('update', 'PropertyController@update');
		Route::post('delete', 'PropertyController@destroy');
		Route::get('download_attach/{file}', 'PropertyController@download_attach');
	});

	Route::get('logout','ProfessionalController@logout');
});
Auth::routes();

Route::get('/home', 'HomeController@index');
