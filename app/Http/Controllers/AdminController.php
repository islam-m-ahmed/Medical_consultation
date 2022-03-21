<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // view form add doctor
    public function addView(){
        return view('admin.add_doctor');

    }

     //store data about doctor
    public function upload(DoctorRequest $request){
        $request->validate([
        'file' => 'required'
        ]);
        $doctor = new Doctor;
        // image
        $image = $request->file;
        $imageName = time().'.'.$image->getClientoriginalExtension();
        $request->file->move('doctot_image',$imageName);
        $doctor->image = $imageName;
        // other
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->specialty =$request->speciaity;
        $doctor->room = $request->room;
        //  dd($request->speciaity);
        $doctor->save();
       return redirect()->back()->with('message','Doctor add successfully');

    }

    // show data about doctor
    public function showDoctor(){
        $doctors = Doctor::all();
        return view('admin.showDoctor',compact('doctors'));

    }

    // delete doctor
    public function delete_doctor($id){
        Doctor::find($id)->delete();
        return redirect()->back();
    }

    //show  update doctor
    public function update_doctor($id){
            $data = Doctor::find($id);
            return view('admin.update_doctor',compact('data'));
    }
    // actullay update docotor data
    public function store_doctor(DoctorRequest $request, $id){
        $doctor = Doctor::find($id);
        //image
        $image = $request->file;
        if($image){
            $imageName = time().'.'.$image->getClientoriginalExtension();
            $request->file->move('doctot_image',$imageName);
            $doctor->image = $imageName;
        }


        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->specialty =$request->speciaity;
        $doctor->room = $request->room;
        //  dd($request->speciaity);
        $doctor->save();
       return redirect()->back()->with('message','Doctor update successfully');
    }



}
