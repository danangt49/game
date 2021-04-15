<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('provinsi', 'API\ProvinceController@index');

Route::group([ 'prefix' => 'auth' ], function () {

    /*
    |--------------------------------------------------------------------------
    | API ROUTES AUTH
    |--------------------------------------------------------------------------
    */
    Route::post('login', 'API\AuthController@login');
    Route::post('signup', 'API\AuthController@signup');

    Route::group([ 'middleware' => 'auth:api' ], function() {
        /*
        |--------------------------------------------------------------------------
        | API ROUTES FETCH USER, FAQ, SETTING & DO LOGOUT
        |--------------------------------------------------------------------------
        */
        Route::get('user', 'API\AuthController@user');
        Route::get('logout', 'API\AuthController@logout');
        Route::patch('update-info', 'API\AuthController@updateUserInfo');
        Route::post('change-password', 'API\AuthController@change_password');
        Route::get('faq', 'API\FAQController@index');
        Route::get('setting', 'API\SettingController@index');
        Route::get('reference', 'API\ReferenceController@index');
        Route::get('wallet', 'API\WalletController@index');
        
        /*
        |--------------------------------------------------------------------------
        | API ROUTES FETCH (GAMES)
        |--------------------------------------------------------------------------
        */
        Route::get('list-games', 'API\GamesController@index');
        Route::get('peringkat-games/{id}', 'API\GamesController@peringkat');
        Route::get('pemain-teratas', 'API\GamesController@pemain_teratas');
        Route::get('game-pc', 'API\GamesController@game_pc');
        Route::get('game-mobile', 'API\GamesController@game_mobile');
        
        /*
        |--------------------------------------------------------------------------
        | API ROUTES FETCH (MATCH)
        |--------------------------------------------------------------------------
        */
        Route::get('match-upcoming/{game_id}', 'API\GamesController@matchUpcoming');
        Route::get('match-ongoing-or-active/{game_id}', 'API\GamesController@matchOngoingOrActive');
        Route::get('match-complete/{game_id}', 'API\GamesController@matchComplete');
        Route::get('if-im-join-this-match', 'API\GamesController@ifImJoinThisMatch');
        
        /*
        |--------------------------------------------------------------------------
        | API ROUTES FETCH (TRANSACTION)
        |--------------------------------------------------------------------------
        */
        Route::get('bank-nominal', 'API\TransactionController@index');
        Route::post('order-voucher-top-up', 'API\TransactionController@topup');
        Route::get('user-balance', 'API\AuthController@userBalance');
        Route::post('join-solo', 'API\TransactionController@joinSolo');
        Route::post('join-solo-paid', 'API\TransactionController@joinSoloPaid');
        Route::post('join-duo', 'API\TransactionController@joinDuo');
        Route::post('join-duo-paid', 'API\TransactionController@joinDuoPaid');
        Route::post('join-squad', 'API\TransactionController@joinSquad');
        Route::post('join-squad-paid', 'API\TransactionController@joinSquadPaid');
        
        /*
        |--------------------------------------------------------------------------
        | API ROUTES REDEEM (VOUCHER / ORDER VOUCHER)
        |--------------------------------------------------------------------------
        */
        Route::get('redeem-voucher', 'API\VoucherController@redeem');
        
        /*
        |--------------------------------------------------------------------------
        | API ROUTES HISTORY PLAY
        |--------------------------------------------------------------------------
        */
        Route::get('history-play', 'API\PlayerController@index');
        
        /*
        |--------------------------------------------------------------------------
        | API ROUTES FETCH (BLOG)
        |--------------------------------------------------------------------------
        */
        Route::get('game-blog', 'API\BlogController@index');
        /*
        |--------------------------------------------------------------------------
        | API ROUTES FETCH (BANNER)
        |--------------------------------------------------------------------------
        */
        Route::get('game-banner', 'API\BannerController@index');
    });
});