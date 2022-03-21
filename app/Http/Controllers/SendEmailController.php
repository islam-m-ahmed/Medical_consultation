<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Notifications\emailNotification;
use Illuminate\Support\Facades\Notification ;


class SendEmailController extends Controller
{
    //
     //send email
     public function send_email($id){
        $data = Appointment::find($id);
        return view('admin.send_email',compact('data'));
    }
    //send_now
    public function send_now(Request $request, $id){
        $data = Appointment::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body'  => $request->body,
            'action_text'  => $request->action_text,
            'action_url'  => $request->action_url,
            'end'  => $request->end
        ];
        Notification::send($data, new emailNotification($details));
        return redirect()->back()->with('message','email send sucsecss');
    }
}
