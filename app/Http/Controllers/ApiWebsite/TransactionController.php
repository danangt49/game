<?php

namespace App\Http\Controllers\ApiAdmin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiAdmin\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Transaction;
use App\Book;
use App\BookDisplay;
use Carbon\Carbon;
class TransactionController extends BaseController
{
    public function getBeli(){
        $transaction = Transaction::with(['books', 'users'])->where('status', 'beli')->get();

        return $this->sendResponse($transaction, 'Transaction Beli Berhasil Didapatkan.');
    }

    public function getPinjam(){
        $transaction = Transaction::with(['books', 'users'])->where('status', 'pinjam')->get();

        return $this->sendResponse($transaction, 'Transaction Pinjam Berhasil Didapatkan.');
    }

    public function getSewa(){
        $transaction = Transaction::with(['books', 'users'])->where('status', 'sewa')->get();

        return $this->sendResponse($transaction, 'Transaction Sewa Berhasil Didapatkan.');
    }
}
