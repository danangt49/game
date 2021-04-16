<?php
namespace App\Http\Controllers\Admin;   
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Announcement;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announ = Announcement::all();
        return view('admin.announcement.home',['announ' => $announ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'message'          => 'required|string|max:30',
        ],
        [
            'message.required' => 'Must be filled !!',
        ]);

        $announ             = new Announcement;
        $announ->message    = $request->message;
        $announ->save();
        return redirect('admin/announcement')->with('success', 'Data added successfully');
    }

    public function edit($id)
    {
        $announ       = Announcement::find($id);
        $announs      = Announcement::get();
        return view('admin.announcement.editannouncement',['announ'  => $announ,'announs' => $announs]);
    }

    public function update(Request $request,$id)
    {
        $announ = Announcement::find($id);
        $announ->update($request->all());
        return redirect('admin/announcement')->with('success','Data updated successfully');
    }


    public function delete($id)
    {
        $announ = Announcement::find($id);
        $announ->delete();
        return redirect('admin/announcement');
    }
  
}

