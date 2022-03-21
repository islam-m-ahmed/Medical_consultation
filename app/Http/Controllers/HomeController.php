<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use AppendIterator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // if auth
    public function redirect(){
        if(Auth::id()){
            if(Auth::user()->userType == 0){
                $doctors = Doctor::all();
                return view('user.home',compact('doctors'));
            }
            else{
                return view('admin.home');
            }
        }
        else{
            return redirect()->back();
        }
    }

    // main page
    public function index(){
        if(Auth()->id()){
            return redirect('Home');
        }else{
            $doctors = Doctor::all();
            return view('user.home',compact('doctors'));
        }
    }

    //about us page
    public function about(){
        if(!Auth::check() || auth()->user()->userType == 0 ){
            $doctors = Doctor::all();
            return view('user.about',compact('doctors'));
        } else{
            return redirect('Home');
        }
    }

    //doctors page
    public function doctors(){
        if(!Auth::check() || auth()->user()->userType == 0 ){
            $doctors = Doctor::all();
            return view('user.all_doctors',compact('doctors'));
        } else{
            return redirect('Home');
        }
    }
    //all_latest page
    public function all_latest(){
        if(!Auth::check() || auth()->user()->userType == 0 ){
            return view('user.all_latest');
        } else{
            return redirect('Home');
        }
    }
    // appointment_page
    public function appointment_page(){
        if(!Auth::check() || auth()->user()->userType == 0 ){
            $doctors = Doctor::all();
            return view('user.appointment_page',compact('doctors'));
        } else{
            return redirect('Home');
        }
    }

}
