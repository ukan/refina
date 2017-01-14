<?php

Route::group(['prefix' => 'admin','middleware' => 'AdminAccess', 'namespace' => 'Backend\Admin'], function () {

    Route::get('dashboard/{code?}', array('as' => 'admin-dashboard', 'uses' => 'DashboardController@index'));
    Route::post('dashboard/post', array('as' => 'hq-admin-dashboard-post', 'uses' => 'DashboardController@HqDashboardPost'));
    Route::any('/admin_dashboard_ajax_bulletin_pagination', array('as' => 'admin-dashboard-ajax-pagination-bulletin-board-member', 'uses' => 'DashboardController@AjaxPaginationBulletinBoard'));
    Route::get('profile', array('as' => 'admin-profile', 'uses' => 'ProfileController@index'));
    Route::put('profile/{type}', array('as' => 'admin-profile-update', 'uses' => 'ProfileController@update'));

    Route::group(['prefix' => 'user-trustees','namespace' => 'UserTrustee'], function () {

        // Menu Management...
        Route::resource('menus', 'MenuController', ['except' => 'show']);
        Route::delete('menus/{id}/delete', 'MenuController@destroy');

        // Role Management...
        Route::resource('roles', 'RoleController', ['except' => 'show']);

        // User Trustee Management...
        Route::resource('users', 'UserController', ['except' => 'show']);
        Route::delete('users/{id}/delete', 'UserController@delete');

    });

    Route::group(['prefix' => 'management'], function () {
        //route Users
        Route::get('users', array('as' => 'admin-index-users', 'uses' => 'UsersController@index'));
        Route::get('users/create', array('as' => 'admin-create-users', 'uses' => 'UsersController@create'));
        Route::post('users/store', array('as' => 'admin-post-users', 'uses' => 'UsersController@store'));
        Route::get('users/{id}/edit', array('as' => 'admin-edit-users', 'uses' => 'UsersController@edit'));
        Route::post('users/{id}/update', array('as' => 'admin-update-users', 'uses' => 'UsersController@update'));
        Route::get('users/{id}/delete', array('as' => 'admin-delete-users', 'uses' => 'UsersController@destroy'));
        Route::post('users/{id}/restore', array('as' => 'admin-restore-users', 'uses' => 'UsersController@restore'));
        Route::get('users/{id}/show', array('as' => 'admin-show-users', 'uses' => 'UsersController@show'));

    });

    Route::group(['prefix' => 'manage-pages'], function () {
        Route::get('contact-us', array('as' => 'admin-contact-us', 'uses' => 'ManagePagesController@createEditContactUs'));
        Route::post('contact-us/store-update', array('as' => 'admin-post-update-contact-us', 'uses' => 'ManagePagesController@storeUpdateContactUs'));
        Route::get('terms-and-conditions', array('as' => 'admin-terms-and-conditions', 'uses' => 'ManagePagesController@createEditTermsAndConditions'));
        Route::post('terms-and-conditions/store-update', array('as' => 'admin-post-update-terms-and-conditions', 'uses' => 'ManagePagesController@storeUpdateTermsAndConditions'));
        Route::get('faq', array('as' => 'admin-faq', 'uses' => 'ManagePagesController@createEditFaq'));
        Route::post('faq/store-update', array('as' => 'admin-post-update-faq', 'uses' => 'ManagePagesController@storeUpdateFaq'));
        Route::get('career', array('as' => 'admin-career', 'uses' => 'ManagePagesController@createEditCareer'));
        Route::post('career/store-update', array('as' => 'admin-post-update-career', 'uses' => 'ManagePagesController@storeUpdateCareer'));
        Route::get('privacy-policy', array('as' => 'admin-privacy-policy', 'uses' => 'ManagePagesController@createEditPrivacyPolicy'));
        Route::post('privacy-policy/store-update', array('as' => 'admin-post-update-privacy-policy', 'uses' => 'ManagePagesController@storeUpdatePrivacyPolicy'));
        Route::get('about-us', array('as' => 'admin-about-us', 'uses' => 'ManagePagesController@createEditAboutUs'));
        Route::post('about-us/store-update', array('as' => 'admin-post-update-about-us', 'uses' => 'ManagePagesController@storeUpdateAboutUs'));
    });

    /*Route::group(['prefix' => 'manage-bulletin-board'], function () {
        Route::get('', array('as' => 'admin-index-bulletin-board', 'uses' => 'BulletinBoardsController@index'));
        Route::post('show', array('as' => 'admin-show-bulletin-board', 'uses' => 'BulletinBoardsController@show'));
        Route::post('post_bulletin_board', array('as' => 'admin-post-bulletin-board', 'uses' => 'BulletinBoardsController@post_buletin_board'));
        Route::post('post_publish_bulletin_board', array('as' => 'admin-post-publish-bulletin-board', 'uses' => 'BulletinBoardsController@post_publish'));
        Route::post('get_publish_bulletin_board', array('as' => 'admin-get-publish-bulletin-board', 'uses' => 'BulletinBoardsController@get_data'));
    });*/

    Route::group(['prefix' => 'log-history-page','namespace' => 'Hq'], function () {
        Route::get('log-history', array('as' => 'admin-view-history-log', 'uses' => 'HistoryLogsController@index'));
        Route::get('log-history-datatable-login', array('as' => 'admin-view-history-log-datatable-login', 'uses' => 'HistoryLogsController@datatablesLogin'));
        Route::get('log-history-datatable-transaction', array('as' => 'admin-view-history-log-datatable-transaction', 'uses' => 'HistoryLogsController@datatablesTransaction'));
        Route::get('log-history-datatable-order', array('as' => 'admin-view-history-log-datatable-order', 'uses' => 'HistoryLogsController@datatablesOrder'));
    });

    Route::group(['prefix' => 'user-request','namespace' => 'Hq'], function () {
        Route::get('datatables-user-request', array('as' => 'admin-hq-user-request-datatables', 'uses' => 'UserRequestController@datatables'));

        Route::any('post', array('as' => 'admin-hq-user-request-post', 'uses' => 'UserRequestController@post'));

    });
});