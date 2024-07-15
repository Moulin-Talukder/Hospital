<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Notification;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    public function addview(){

        if(Auth::id()){
            
            if(Auth::user()->usertype == 1){
                 return view('admin.add_doctor');
            }
            else{
                return redirect()->back();
            }
        }else{
            return redirect('login');
        }

        


        return view('admin.add_doctor');
    }


    public function upload(Request $request){

        $doctor = new Doctor;
        $image = $request->file;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorimage', $imagename);
        $doctor->image = $imagename;
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;
        $doctor->save();

        $notify = ['type' => 'success', 'message' => 'Doctor added successfully'];

        return redirect()->back()->with('notify', $notify);

    }


    public function showappointments(){
        
        $appointments = Appointment::all();
        
        if(Auth::id()){
            
            if(Auth::user()->usertype == 1){
                 return view('admin.show_appointments', compact('appointments'));
            }
            else{
                return redirect()->back();
            }
        }else{
            return redirect('login');
        }

    }


    public function approve($id){

        $appointments = Appointment::findOrFail($id);
        $appointments->status = 'approved';
        $appointments->save();


        $notify = ['type' => 'success', 'message' => 'Appointment approved successfully'];

        return redirect()->back()->with('notify', $notify);

    }

    public function cancel($id){

        $appointments = Appointment::findOrFail($id);
        $appointments->status = 'canceled';
        $appointments->save();


        $notify = ['type' => 'success', 'message' => 'Appointment canceled successfully'];

        return redirect()->back()->with('notify', $notify);

    }


    public function showdoctors(){

        $doctors = Doctor::all();

        return view('admin.show_doctors', compact('doctors'));
    }


    public function deletedoctor($id){

        $doctors = Doctor::findOrFail($id);
        
        $doctors->delete();

        return redirect()->back();

    }


    public function editdoctor($id){

        $doctors = Doctor::findOrFail($id);

        return view('admin.update_doctors', compact('doctors'));

    }


    public function updatedoctor(Request $request ,$id){

        $doctors = Doctor::findOrFail($id);


        $doctors->name = $request->name;
        $doctors->phone = $request->phone;
        $doctors->speciality = $request->speciality;
        $doctors->room = $request->room;

        $image = $request->file;

        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->file->move('doctorimage', $imagename);
            $doctors->image = $imagename;
        }


        $doctors->save();

        $notify = ['type' => 'success', 'message' => 'Doctor updated successfully'];

        return redirect()->back()->with('notify', $notify);

    }
    
    
    public function emailview($id){
        
        $appointment = Appointment::findOrFail($id);
        
        return view('admin.email_view', compact('appointment'));
        
    }


    public function sendemail(Request $request, $id){

        $appointment = Appointment::findOrFail($id);

        $details = [

            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart

        ];

        Notification::send($appointment, new SendEmailNotification($details));


        $notify = ['type' => 'success', 'message' => 'Email sent successfully'];

        return redirect()->back()->with('notify', $notify);

    }


}