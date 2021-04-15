<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Notification;
use Berkayk\OneSignal\OneSignalFacade;
use Illuminate\Support\Facades\URL;

class NotificationController extends Controller
{
    public function index(){
        $data = Notification::Find(1);
        return view('admin.notification.home', ['data' => $data]);
    }
    
    public function update(Request $request)
    {
        $request->validate([
            'picture' => 'mimes:jpeg,png,jpg|max:2048',
        ]);
        $id                         = $request->id;
        $file                       = $request->file('picture');   
        $imglama	                = $request->picturelama;
        $imgfulllama	            = $request->urlpicturelama;
        
        $segment                    = "Subscribed Users";
        $url                        = $request->url;
        $headings                   = $request->title;
        $message                    = $request->message;

        if($file){
            $filename               = "banner." . $file->getClientOriginalExtension();
            $path                   = 'public/asset/notifikasi';
            $file->move($path,$filename);
            $data_db = [
                'title'             => $request->title,
                'message'           => $request->message,
                'url'	            => $request->url,
                'picture'           => $filename,
                'picture_url'       => URL::to('/').'/'.$path.'/'.$filename
            ];
            
            $gambar                 = URL::to('/').'/'.$path.'/'.$filename;
            // $gambar                 = "https://i.pinimg.com/originals/a6/72/a8/a672a8fc358b603ffb9bc1f7b9b63f4e.jpg";
            OneSignalFacade::sendNotificationToSegment(
                $gambar,
                $message,
                $segment,
                $url,
                $data = null,
                $buttons = null,
                $schedule = null,
                $headings
            );
            // unlink($path.'/'.$imglama);
        }
        else {
            $data_db = [
                'title'             => $request->title,
                'message'           => $request->message,
                'url'	            => $request->url,
                'picture'           => $imglama,
                'picture_url'       => $imgfulllama
            ];
            $gambar                 = $imgfulllama;
            // $gambar                 = "https://i.pinimg.com/originals/a6/72/a8/a672a8fc358b603ffb9bc1f7b9b63f4e.jpg";
            OneSignalFacade::sendNotificationToSegment(
                $gambar,
                $message,
                $segment,
                $url,
                $data = null,
                $buttons = null,
                $schedule = null,
                $headings
            );
        }
        
        Notification::where('id','=',$id)->update($data_db);
        return redirect('admin/notification')->with('success','Data updated successfully');
        
    }

}
