<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Auth::routes(['reset'=>true,'register'=>false]);
Route::middleware('admin')->prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/JSONaktivitas', 'HomeController@json');
    Route::post('/JSONaktivitas', 'HomeController@jsonaktivitas');

    //games
    Route::get('/games', 'GameController@index')->name('games');
    Route::get('/JSONgames', 'GameController@json');
    Route::get('/games/{id}', 'GameController@edit');
    Route::post('/games-update/{id}', 'GameController@update');
    Route::get('/games-delete/{id}', 'GameController@destroy');
    Route::get('/games-create', 'GameController@create');
    Route::post('/games-store', 'GameController@store');

    //matches
    Route::get('/matches', 'MatchController@index')->name('matches');
    Route::get('/JSONmatches', 'MatchController@json');
    Route::get('/JSONmatches/{id}', 'MatchController@jsonDetailScore');
    Route::get('/matches-create', 'MatchController@create');
    Route::post('/matches-store', 'MatchController@store');
    Route::get('/matches/{id}', 'MatchController@edit');
    Route::post('/matches-update/{id}', 'MatchController@update');
    Route::get('/matches-delete/{id}', 'MatchController@destroy');
    Route::get('/matches-player/{id}', 'MatchController@jsonplayer');
    Route::get('/matches-score/{id}', 'MatchController@jsonscore');
    Route::get('/matches-score-update/{id}', 'MatchController@updatescore');
    Route::get('/jsonscore', 'MatchController@jsonscore');


    //modul
    Route::get('/modul', 'ModulController@index')->name('modul');
    Route::get('/json-modul', 'ModulController@json');
    Route::get('/modul-create', 'ModulController@create');
    Route::post('/modul-store', 'ModulController@store');
    Route::get('/modul-update/{id}', 'ModulController@edit');
    Route::post('/modul-update/{id}', 'ModulController@update');
    Route::get('/modul-delete/{id}', 'ModulController@destroy');

    //page
    Route::get('/page', 'PageController@index')->name('page');
    Route::get('/json-page', 'PageController@json');
    Route::get('/page-create', 'PageController@create');
    Route::post('/page-store', 'PageController@store');
    Route::get('/page-update/{id}', 'PageController@edit');
    Route::post('/page-update/{id}', 'PageController@update');
    Route::get('/page-delete/{id}', 'PageController@destroy');

    //page
    Route::get('/blog', 'BlogController@index')->name('blog');
    Route::get('/json-blog', 'BlogController@json');
    Route::get('/blog-create', 'BlogController@create');
    Route::post('/blog-store', 'BlogController@store');
    Route::get('/blog-update/{id}', 'BlogController@edit');
    Route::post('/blog-update/{id}', 'BlogController@update');
    Route::get('/blog-delete/{id}', 'BlogController@destroy');

    //member
    Route::get('/member', 'UserConfigController@index')->name('user-config');
    Route::get('/JSON-member', 'UserConfigController@json');
    Route::get('/member/{id}', 'UserConfigController@edit');
    Route::post('/member-update/{id}', 'UserConfigController@update');
    Route::post('/member-topup/{id}', 'UserConfigController@topup');
    Route::get('/member-delete/{id}', 'UserConfigController@destroy');
   
    //faq
    Route::get('/faq', 'FaqController@index');
    Route::post('/faq/store', 'FaqController@store');
    Route::get('/faq/edit/{id}', 'FaqController@edit');
    Route::post('/faq/update/{id}', 'FaqController@update');
    Route::get('/faq/delete/{id}', 'FaqController@delete');

    //voucher
    Route::get('/voucher', 'VoucherController@index')->name('voucher');
    Route::post('/voucher/store', 'VoucherController@store');
    Route::get('/voucher/edit/{id}', 'VoucherController@edit');
    Route::post('/voucher/update/{id}', 'VoucherController@update');
    Route::get('/voucher/delete/{id}', 'VoucherController@delete');

    //password
    Route::get('/password', 'UserConfigController@password')->name('password');
    Route::post('/password', 'UserConfigController@savepassword');
    
    //announcement
    Route::get('/announcement', 'AnnouncementController@index')->name('announcement');
    Route::post('/announcement/store', 'AnnouncementController@store');
    Route::get('/announcement/edit/{id}', 'AnnouncementController@edit');
    Route::post('/announcement/update/{id}', 'AnnouncementController@update');
    Route::get('/announcement/delete/{id}', 'AnnouncementController@delete');

    //setting
    Route::get('/setting', 'SettingController@index')->name('setting');
    Route::post('/setting/update', 'SettingController@update');
    
    //province
    Route::get('/province', 'ProvinceController@index')->name('province');

    //turnament
    // Route::get('/tournament', 'TournamentController@index')->name('tournament');
    // Route::get('/JSON-tournament', 'TournamentController@json');

    //menu
    Route::get('/menu', 'MenuController@index');
    Route::post('/menu/addcustommenu','MenuController@addcustommenu')->name('haddcustommenu');
    Route::post('/menu/deleteitemmenu','MenuController@deleteitemmenu')->name('hdeleteitemmenu');
    Route::post('/menu/deletemenug','MenuController@deletemenug')->name('hdeletemenug');
    Route::post('/menu/createnewmenu','MenuController@createnewmenu')->name('hcreatenewmenu');
    Route::post('/menu/generatemenucontrol','MenuController@generatemenucontrol')->name('hgeneratemenucontrol');
    Route::post('/menu/updateitem', 'MenuController@updateitem')->name('hupdateitem');

    //bammer
    Route::get('/banner', 'BannerController@index')->name('banner');
    Route::post('/banner/store', 'BannerController@store');
    Route::get('/banner/edit/{id}', 'BannerController@edit');
    Route::post('/banner/update/{id}', 'BannerController@update');
    Route::get('/banner/delete/{id}', 'BannerController@delete');
    
    //category game
    Route::get('/category', 'CategoryController@index')->name('category');
    Route::post('/category/store', 'CategoryController@store');
    Route::get('/category/edit/{id}', 'CategoryController@edit');
    Route::post('/category/update/{id}', 'CategoryController@update');
    Route::get('/category/delete/{id}', 'CategoryController@delete');

    //notification
    Route::get('/notification', 'NotificationController@index')->name('notification');
    Route::post('/notification/update', 'NotificationController@update');

    //report
    Route::get('/report', 'ReportController@index')->name('report');
    Route::get('/report/{id}', 'ReportController@edit');
    Route::post('/report-update/{id}', 'ReportController@update');
    Route::post('/report-topup/{id}', 'ReportController@topup');

    //bank
    Route::get('/bank', 'BankController@index')->name('bank');
    Route::post('/bank/store', 'BankController@store');
    Route::get('/bank/edit/{id}', 'BankController@edit');
    Route::post('/bank/update/{id}', 'BankController@update');
    Route::get('/bank/delete/{id}', 'BankController@delete');

    //nominal
    Route::get('/nominal', 'NominalController@index')->name('nominal');
    Route::post('/nominal/store', 'NominalController@store');
    Route::get('/nominal/edit/{id}', 'NominalController@edit');
    Route::post('/nominal/update/{id}', 'NominalController@update');
    Route::get('/nominal/delete/{id}', 'NominalController@delete');

    //transfer
    Route::get('/confirmation', 'TransferController@index')->name('confirmation');
    Route::get('/confirmation/status/{id}/{data}', 'TransferController@status');
   
});

Auth::routes(['register'=>false,'reset'=>false]);
Route::get('/', 'WelcomeController@index');