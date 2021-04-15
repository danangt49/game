<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use App\User;
use Yajra\DataTables\Facades\DataTables;

class UserConfigController extends Controller
{
    public function index()
    {
        return view('admin.member.home');
    }
    public function json()
    {
        $data = User::get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '
                <a class="btn btn-secondary" tooltip="Show Detail User" href="'.url('admin/member/' . $row->id . '').'"><i class="fab fa-servicestack">
                ';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.member.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'          => 'required',
            'email'         => 'required',
            'token'         => 'required'
        ], [
            'name.required' => 'Must be filled !!',
            'email.required' => 'Must be filled !!',
            'token.required' => 'Must be filled !!'
        ]);
        $data = User::find($id);
        $data->update($request->all());
        return view('admin.member.home')->with('success', 'Data updated successfully');
    }

    public function topup(Request $request, $id)
    {
        $this->validate($request, [
            'topup'         => 'required'
        ], [
            'topup.required' => 'Must be filled !!'
        ]);
        $data_insert2       = User::find($id);
        $data_insert2->token = $request['topup'];
        $data_insert2->save();
        return view('admin.member.home')->with('success', 'Data updated successfully');
    }

    public function password()
    {
        $user = User::Find(1);
        return view('admin.password.password', compact('user'));
    }

    public function savepassword(Request $request)
    {
        $request->validate([
            'password_lama' => ['required', new MatchOldPassword],
            'password_baru' => ['required'],
            'confirm_password_baru' => ['same:password_baru'],
        ]);

        User::find(1)->update(['password' => Hash::make($request->password_baru)]);

        return redirect('admin/password')->with('success', 'Password has been updated');
    }
}
