<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
    public function redirect(){

        if(Auth::id()){

            if(Auth::user()->usertype == '0'){


                $doctors = Doctor::all();

                return view('user.home', compact('doctors'));
            }

            else{
                return view('admin.home');
            }

        }

        else{
            return redirect()->back();
        }
    }


    public function index(){

        if(Auth::id()){

            return redirect('home');
        }

        else{
            $doctors = Doctor::all();

        return view('user.home', compact('doctors'));
        }

        
    }


    public function appointment(Request $request){

        $appointment = new Appointment;

        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->phone = $request->phone;
        $appointment->doctor = $request->doctor;
        $appointment->date = $request->date;
        $appointment->status = 'In Progress';
        $appointment->message = $request->message;

        if(Auth::id()){
            $appointment->user_id = Auth::user()->id;
        }

        $appointment->save();

        $notify = ['type' => 'success', 'message' => 'Appointment requested successfully. We will contact with you soon'];

        return redirect()->back()->with('notify', $notify);

    }


    public function myappointment(){

        if(Auth::id()){
            
            if(Auth::user()->usertype == 0){
                
            $userId = Auth::user()->id;
            $appointments = Appointment::where('user_id', $userId)->get();  

            return view('user.my_appointment', compact('appointments'));
                
            }
            
            else{
                return redirect()->back();
            }
            
        }

        else{
            return redirect('login');
        }

        
    }


    public function cancel_appointment($id){


        $appointments = Appointment::find($id);

        $appointments->delete();

        return redirect()->back();

    }

}
