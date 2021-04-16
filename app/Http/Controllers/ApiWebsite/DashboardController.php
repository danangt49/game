<?php

namespace App\Http\Controllers\ApiAdmin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiAdmin\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Book;
use App\User;
use App\Voucher;
use App\Activity;
use App\Transaction;

class DashboardController extends BaseController
{
    public function getDashboard(){
        $booksCount = Book::all()->count();
        $usersCount = User::all()->count();
        $voucherCount = Voucher::all()->count();
        $transactionsCount = Transaction::all()->count();
        $newMembers = User::orderBy('created_at', 'desc')->where('is_admin', '!=', '1')->limit(9)->get();
        
        $activity = Activity::with('users')->orderBy('created_at', 'desc')->limit(5)->get();

        $chartBeli = Transaction::where('status', 'beli')->count();
        $chartPinjam = Transaction::where('status', 'pinjam')->count();
        $chartSewa = Transaction::where('status', 'sewa')->count();
        
        $chartActivity = Activity::selectRaw('menu_name as name,count(*) as uv')->groupBy('menu_name')->get();

        $beli = [
            'name'=> 'DIBELI',
            'buku'=> $chartBeli
        ];
        
        $pinjam = [
            'name'=> 'DIPINJAM',
            'buku'=> $chartPinjam
        ];
        
        $sewa = [
            'name'=> 'DISEWA',
            'buku'=> $chartSewa
        ];

        $dashboard = [
            'books' => $booksCount,
            'users' => $usersCount,
            'vouchers' => $voucherCount,
            'transactions' => $transactionsCount,
            'new_members' => $newMembers,
            'activitas' => $activity,
            'charts' => [$beli, $pinjam, $sewa],
            'chartActivity' => $chartActivity
        ];

        return $this->sendResponse($dashboard, 'Dashboard successfully.');
    }
}
