<?php

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', array('as' => 'home', 'uses' => 'HomeController@index'));
    Route::any('/saving_cookie/{id}', array('as' => 'saving_cookie', 'uses' => 'OptinController@savingCookie'));
    Route::any('/destroy_cookie', array('as' => 'destroy_cookie', 'uses' => 'HomeController@destroy_cookie'));
    Route::any('/show_cookie', array('as' => 'show_cookie', 'uses' => 'OptinController@show_cookie'));
    Route::any('/show_session', array('as' => 'show_session', 'uses' => 'OptinController@show_session'));
    
    Route::get('/sign_in', array('as' => 'admin-login-member', 'uses' => 'HomeController@sign_in'));
    //Route::post('/sign_in', array('as' => 'admin-login-member', 'uses' => 'AuthController@postLogin'));
    Route::get('/sign_up', array('as' => 'sign_up', 'uses' => 'HomeController@sign_up'));
    Route::post('/sign_up', array('as' => 'post-sign-up', 'uses' => 'UsersController@postSignUp'));
    
    Route::get('/reset-password', array('as' => 'reset-password', 'uses' => 'UsersController@resetPassword'));
    Route::post('/process-reset-password', array('as' => 'process-reset-password', 'uses' => 'UsersController@processResetPassword'));
    Route::get('/change-password/{forgot_token}', array('as' => 'change-password', 'uses' => 'UsersController@changePassword'));
    Route::post('/process-change-password/{forgot_token}', array('as' => 'process-change-password', 'uses' => 'UsersController@processChangePassword'));

    Route::get('/process-activation/{forgot_token}', array('as' => 'process-activation', 'uses' => 'UsersController@processActivation'));

    Route::any('/process-confirmation-goods-have-been-received/{forgot_token}', array('as' => 'process-confirmation-goods-have-been-received', 'uses' => 'FunnelsController@processConfirmationGoodsHaveBeenReceived'));

    Route::get('/subscribe', array('as' => 'subscribe', 'uses' => 'HomeController@subscribe'));
    Route::get('/s/{wordress}/{url_generation}', array('as' => 'optin-get-facebook', 'uses' => 'OptinController@save_cookie_from_social_media_share'));

    Route::group(['middleware' => 'MemberAccess', 'namespace' => 'Member'], function () {    
        Route::any('/dashboard/{filter}', array('as' => 'admin-dashboard-filter-member', 'uses' => 'DashboardController@index'));
        Route::any('/dashboard', array('as' => 'admin-dashboard-member', 'uses' => 'DashboardController@index'));
        Route::any('/dashboard_ajax_bulletin_pagination', array('as' => 'admin-dashboard-ajax-pagination-bulletin-board-member', 'uses' => 'DashboardController@ajax_pagination_bulletin_board'));
        Route::get('/dashboard_datatables_orders', array('as' => 'datatables-dashboard-funnel-orders', 'uses' => 'DashboardController@datatables_orders'));

        Route::get('/my-profile', array('as' => 'member-profile', 'uses' => 'ProfileController@index'));

        Route::post('/my-profile/post_profile', array('as' => 'member-profile-post', 'uses' => 'ProfileController@post_profile'));

        Route::post('/my-profile/profile-edit-avatar', array('as' => 'member-profile-profile-edit-avatar-process', 'uses' => 'ProfileController@processEditAvatar'));
        Route::get('/my-profile/profile-edit', array('as' => 'member-profile-profile-edit', 'uses' => 'ProfileController@profileEdit'));
        Route::post('/my-profile/profile-edit', array('as' => 'member-profile-profile-edit-process', 'uses' => 'ProfileController@processProfileEdit'));
        Route::get('/my-profile/profile-edit-bank-account', array('as' => 'member-profile-profile-edit-bank-account', 'uses' => 'ProfileController@profileEditBankAccount'));
        Route::post('/my-profile/profile-edit-bank-account', array('as' => 'member-profile-profile-edit-bank-account-process', 'uses' => 'ProfileController@processProfileEditBankAccount'));
        Route::get('/my-profile/profile-completion', array('as' => 'member-profile-profile-completion', 'uses' => 'ProfileController@profileCompletion'));
        Route::post('/my-profile/profile-completion', array('as' => 'member-profile-profile-completion-process', 'uses' => 'ProfileController@processProfileCompletion'));
        Route::get('/my-profile/change-password', array('as' => 'member-profile-change-password', 'uses' => 'ProfileController@changePassword'));
        Route::post('/my-profile/change-password', array('as' => 'member-profile-change-password-process', 'uses' => 'ProfileController@processChangePassword'));
        Route::get('/my-profile/location-information/{type?}/{id?}/{id_prov?}', array('as' => 'member-profile-location-information-process', 'uses' => 'ProfileController@processLocationInformation'));
        Route::post('/my-profile/upload-crop-avatar', array('as' => 'member-profile-upload-crop-avatar', 'uses' => 'ProfileController@UploadAvatar'));

        Route::get('/my-profile/smtp', array('as' => 'member-general-setting-smtp', 'uses' => 'GeneralSettingController@index_smtp'));
        Route::get('/my-profile/datatables_smtp', array('as' => 'datatables-general-setting-smtp', 'uses' => 'GeneralSettingController@DatatablesSmtp'));
        Route::post('/my-profile/post_smtp', array('as' => 'member-general-setting-smtp-post', 'uses' => 'GeneralSettingController@post_smtp'));
    });
    
    Route::get('/{slug_1?}/{slug_2?}/{slug_3?}/{slug_4?}', array('as' => 'optin', 'uses' => 'OptinController@savingCookie'));
});