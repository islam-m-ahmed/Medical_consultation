<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    //
     //appointment
     public function appointment(AppointmentRequest $request){
        $data = new Appointment;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->message = $request->message;
        $data->doctor = $request->doctor;
        $data->date = $request->date;
        //status
        $data->status = 'In progress';
        if(auth()->id()){
         $data->user_id = Auth::user()->id;
        }
        $data->save();
        return redirect()->back()->with('message','appointment request seccessful . we will contact you');

     }

      //show data appointmet to admin
      public function showAppointment(){
        $data = Appointment::all();
        return view('admin.showAppointment',compact('data'));
    }

    // appprove request appointmet from admin
    public function approved($id){
        $data = Appointment::find($id);
        $data->status = 'approved';
        $data->save();
        return redirect()->back();
    }

    // cancel requst appointmet from admin
    public  function canceled($id){
        $data = Appointment::find($id);
        $data->status = 'canceled';
        $data->save();
        return redirect()->back();
    }

    // show your appiontment to user if request it
    public function myAppointment(){

        if(Auth::user()->userType == 0){
            $id = Auth::user()->id;
            $data= Appointment::where('user_id',$id)->get();
            return view('user.myappointment',compact('data'));
        }
        else{
            return view('admin.home');
        }


    }
        // show your appiontment to user if request it and can cancel
    public function cancel($id){
        Appointment::find($id)->delete();
        return redirect()->back();

    }

}
