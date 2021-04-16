<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\SettingVoucher;
use App\Voucher;
use App\User;



class VoucherController extends Controller
{
       public function index()
    {
        $data_voucher = Voucher::all();
        $jenis        = SettingVoucher::all();
        $date         = Carbon::now();
        return view('admin.voucher.voucher', compact('data_voucher', 'jenis' ,'date'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'title'                 => 'required|string|max:50',
                'count'                 => 'required|numeric',
                'expired_at'            => 'required|date',
                'jenis'                 => 'required',
                'nominal'               => 'required|numeric',
            ],
            [
                'title.required'        => 'This title voucher Name field is required',
                'token_amount.required' => 'This token_amount voucher must numeric',
                'expired_at.required'   => 'This expired_at voucher must date',
                'jenis.required'        => 'The field is required',
                'nominal.required'      => 'The field is required',
            ]
        );

        $count                      = $request->count;
        for($i=0; $i < $count; $i++){
            Voucher::create([
                'title'             => $request->title,
	            'code'              => Str::random(10),
	            'id_jenis'          => $request->jenis,
	            'nominal'           => $request->nominal,
                'expired_at'        => Carbon::parse($request->expired_at),
            ]); 
        }
        return redirect('admin/voucher')->with('success', 'Data added successfully');
    }

    public function edit($id)
    {
        $voucher        = Voucher::find($id);
        return view('admin.voucher.editvoucher', ['voucher' => $voucher,]);
    }

    public function update(Request $request, $id)
    {
        $voucher = Voucher::find($id);
        $voucher->title             = $request->title;
        $voucher->code              = $request->code;
        $voucher->nominal           = $request->nominal;
        $voucher->used              = $request->used;
        $voucher->expired_at        = Carbon::parse($request->expired_at);
        $voucher->update();
        return redirect('admin/voucher')->with('success', 'Data updated successfully');
    }
    
    public function destroy($id)
    {
        $voucher = voucher::find($id);
        $voucher->delete();
        return redirect('admin/voucher');
    }

    public function settingvoucher()
    {   
        $data                       = SettingVoucher::all();
        $date                       = Carbon::now();
        return view('admin.voucher.setting',compact('data','date'));
    }

    public function settingstore(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->validate($request,[
            'title'                 => 'required|string|max:50',
            'nominal'               => 'required|numeric',
        ],
        [
            'title.required'        => 'Must be filled !!!',
            'nominal.required'      => 'Must be filled !!!',
        ]);
       
        $data = [
            'jenis'	                => $request->title,
            'nominal'	            => $request->nominal,
        ];
        SettingVoucher::create($data); 
        return redirect('admin/setting-voucher')->with('success', 'Data Added Successfully');
    }

    public function settingvoucheredit($id)
    {
        $voucher                    = SettingVoucher::find($id);
        return view('admin.voucher.edit-jenis-voucher',['voucher' => $voucher]);
    }
    
    public function settingvoucherupdate(Request $request,$id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->validate($request,[
            'title'                 => 'required|string|max:50',
            'nominal'               => 'required|numeric',
        ],
        [
            'title.required'        => 'Must be filled !!!',
            'nominal.required'      => 'Must be filled !!!',
        ]);
       
        $data = [
            'jenis'	                => $request->title,
            'nominal'	            => $request->nominal,
        ];
        SettingVoucher::where('id',$id)->update($data); 
        return redirect('admin/setting-voucher')->with('success','Data Updated Successfully');
    }

    public function delete($id)
    {
        $voucher                    = SettingVoucher::find($id);
        $voucher->delete();
        return redirect('admin/setting-voucher')->with('success','Data Deleted Successfully');
    }

    public function getJenisVoucher(Request $request){
        $id                             = $request->id;
        $query                          = SettingVoucher::where('id',$id)->get();
        foreach($query as $t){
            $data['nominal'] 	 	    = $t->nominal;
            echo json_encode($data);
        }
    
    }
}
