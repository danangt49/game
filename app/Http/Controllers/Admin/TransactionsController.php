<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionsController extends Controller
{
    public function index()
    {
        $data = DB::select('SELECT books.title, users.name, transactions.created_at, transactions.status, transactions.id FROM transactions join books on transactions.book_id=books.id JOIN users on transactions.user_id=users.id ');
        return view('admin.transactions.home', compact('data'));
    }
}
