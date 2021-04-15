<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransferController extends Controller
{
    public function index()
    {
        $data = DB::select('SELECT users.name,transfers.code, transfers.status_voucher,transfers.kode_voucher,transfers.bank,transfers.created_at, transfers.nominal, transfers.status,transfers.image,transfers.catatan,transfers.id FROM transfers JOIN users on transfers.user_id=users.id ');
        return view('admin.transfer.home',compact('data'));
    }
    public function status($id,$data) 
    {
        $data = Transfer::where('id',$id)->update(['status' => $data]);
        return redirect('admin/confirmation')->with('success', 'Status confirmed successfully');
    }
}
