<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Backend\Admin'], function () {

    Route::group(['prefix' => 'datatables'], function () {
        // Route::get('directories', 'DirectoryController@datatables');
        // Route::get('hashtags/{type}', 'HashtagController@datatables');
        // Route::get('roles', 'UserTrustee\RoleController@datatables');
        // Route::get('user-trustees', array('as' => 'datatables-user-trustees', 'uses' =>'UserTrustee\UserController@datatables'));
        // Route::get('menu', 'UserTrustee\MenuController@datatables');
        // Route::get('country', array('as' => 'datatables-country', 'uses' => 'CountriesController@datatables'));
        // Route::get('province', array('as' => 'datatables-province', 'uses' => 'ProvincesController@datatables'));
        // Route::get('city', array('as' => 'datatables-city', 'uses' => 'CitiesController@datatables'));
        // Route::get('category', array('as' => 'datatables-category', 'uses' => 'CategoriesController@datatables'));
        // //Route::get('user', array('as' => 'datatables-user', 'uses' => 'UsersController@datatables'));
        // Route::get('hastag', array('as' => 'datatables-hastag', 'uses' => 'HastagsController@datatables'));

        // /**
        //  *  Get view page apllication data.
        //  *  url:  '/admin/datatables/application'
        //  *  Code By : Nova (Smooets)
        // */
        // Route::get('application', array('as' => 'datatables-application', 'uses' => 'ApplicationController@datatables'));

        // /**
        //  *  Get view page district data.
        //  *  url:  '/admin/datatables/district'
        //  *  Code By : Nova (Smooets)
        // */
        // Route::get('district', array('as' => 'datatables-district', 'uses' => 'DistrictsController@datatables'));

        // /**
        //  *  Get view page village data.
        //  *  url:  '/admin/datatables/village'
        //  *  Code By : Nova (Smooets)
        // */
        // Route::get('village', array('as' => 'datatables-village', 'uses' => 'VillagesController@datatables'));

        // /**
        //  *  Get view page branch data.
        //  *  url:  '/admin/datatables/branch'
        //  *  Code By : Nova (Smooets)
        // */
        // Route::get('branch', array('as' => 'datatables-branch', 'uses' => 'BranchController@datatables'));

        // Route::get('venue', array('as' => 'datatables-venue', 'uses' => 'VenuesController@datatables'));
        // Route::get('event', array('as' => 'datatables-event', 'uses' => 'EventsController@datatables'));
        

        // Route::get('bulletin-boards', array('as' => 'datatables-bulletin-boards', 'uses' => 'BulletinBoardsController@datatables'));
        // Route::get('tags', array('as' => 'datatables-tags', 'uses' => 'ManageFunnel\TagsController@datatables'));
        // Route::get('options', array('as' => 'datatables-options', 'uses' => 'ManageFrontend\OptionsController@datatables'));

        // Route::get('check-id-upline-users', array('as' => 'datatables-check-id-upline-users', 'uses' => 'CheckIdUplineController@users_datatables'));
        // Route::get('check-id-upline-uplines', array('as' => 'datatables-check-id-upline-uplines', 'uses' => 'CheckIdUplineController@uplines_datatables'));
        // Route::get('autoresponse-emails', array('as' => 'datatables-autoresponse-emails', 'uses' => 'MessageCenter\AutoresponseEmailsController@datatables'));
        // Route::get('plans', array('as' => 'datatables-plans', 'uses' => 'GeneralSetting\PlansController@datatables'));
        // Route::get('coins', array('as' => 'datatables-coins', 'uses' => 'GeneralSetting\CoinsController@datatables'));
        // Route::get('quotas', array('as' => 'datatables-quotas', 'uses' => 'GeneralSetting\QuotasController@datatables'));
        // Route::get('banks', array('as' => 'datatables-banks', 'uses' => 'GeneralSetting\BanksController@datatables'));
        // Route::get('bank-accounts', array('as' => 'datatables-bank-accounts', 'uses' => 'GeneralSetting\BankAccountsController@datatables'));
        // Route::get('announcements', array('as' => 'datatables-announcements', 'uses' => 'MessageCenter\AnnouncementsController@datatables'));    
        // Route::get('datatables-finance-dashboard-transaction', array('as' => 'datatables-finance-dashboard-transaction', 'uses' => 'DashboardController@DatatablesFinanceDashboardTransaction'));    
        // Route::get('datatables-hq-dashboard-hall-of-fame/{code?}/{year?}', array('as' => 'datatables-hq-dashboard-hall-of-fame', 'uses' => 'DashboardController@DatatablesHqDashboardHallOfFame'));    
        // Route::get('datatables-hq-dashboard-order/{code?}/{start_date?}/{end_date?}', array('as' => 'datatables-hq-dashboard-order', 'uses' => 'DashboardController@DatatablesHqDashboardOrder'));   
        // Route::get('datatables-hq-dashboard-withdrawal-request', array('as' => 'datatables-hq-dashboard-withdrawal-request', 'uses' => 'DashboardController@DatatablesHqDashboardWithdrawalRequest'));   

        // Route::get('user-notifications', array('as' => 'admin-datatables-user-notifications', 'uses' => 'UserNotificationsController@datatables'));
    });

});
