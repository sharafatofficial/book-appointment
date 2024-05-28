<?php

namespace App\Http\Controllers;

use auth;
use Carbon\Carbon;
use App\Models\Payment;
use App\Models\Service;
use App\Models\category;
use App\Models\Appointment;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    function index($id){
        $cat_detail=Service::where('category_id',$id)->where('availability','1')->get();
           $category=category::where('isactive','1')->get();
        return view('frontend.detail',compact('cat_detail','category'));
    }

    function appointment_detail($id){
        $service_detail=Service::where('id',$id)->first();
       $start= $service_detail->start_time;
        $end    =$service_detail->end_time;
      
        $timeSlots = $this->generateTimeSlots($start, $end, 30);
       
        $serviceDays = explode(',', $service_detail->days); // Assuming days are stored as a comma-separated string
     
       

        
        return view('frontend.appointment_detail',compact('service_detail','timeSlots','serviceDays'));
    }

    function appointment_store(Request $request){
    // dd($request->all());
        $request->validate([
            'provider_id'=> 'required',
            'date' => 'required|date',
            'duration' => 'required|integer',
            'service_name' => 'nullable|string', 
            'day' => 'required|string',
            'time' => 'required',
            'price' => 'required|numeric',
            'notes' => 'nullable|string',
        ]);
        $request['user_id']=auth()->id();
       

        $appointment = new Appointment();

// Set the attributes
$appointment->user_id = $request->user_id; 
$appointment->service_id = $request->service_id; 
$appointment->provider_id =$request->provider_id; 
$appointment->duration =$request->duration; 
$appointment->date =$request->date; 
$appointment->service_name =$request->service_name;
$appointment->day = $request->day; 
$appointment->time = $request->time; 
$appointment->price = $request->price; 
$appointment->notes = $request->notes; 
$appointment->save();



        return redirect()->route('home')->with('success', 'Appointment created successfully.');
    }
    function appoint_payment(){
        $auth_id=auth()->id();
       $appointment=Appointment::where('user_id',$auth_id)->where('paymentstatus','0')->get();
    //    dd($appointment);
        return view('frontend.account.appointment_payment',compact('appointment'));
    }

    function panding(){
        $auth_id=auth()->id();
       $appointment=Appointment::where('user_id',$auth_id)->where('status','0')->get();
    //    dd($appointment);
        return view('frontend.account.panding_appointment',compact('appointment'));
    }

    function history(){
        $auth_id=auth()->id();
       $appointment=Appointment::where('user_id',$auth_id)->where('status','1')->get();
    //    dd($appointment);
        return view('frontend.account.history',compact('appointment'));
    }


    function checkout($id){
        $auth_id=auth()->id();
        $checkout=Appointment::where('id',$id)->where('user_id',$auth_id)->where('paymentstatus','0')->first();
    //    dd($checkout);
        return view('frontend.account.checkout',compact('checkout'));
    }


    function bank_transaction(Request $request,$id){
 
        $validatedData = $request->validate([
            'service_id' => 'required',
            'provider_id' => 'required',
            'service_name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'day' => 'required|string|max:255',
            'price' => 'required|numeric',
            'bank' => 'required|string|max:255',
            'account_no' => 'required|string|max:255',
        ]);

        Appointment::find($id)->update(['paymentstatus'=>1]);


        $appointment = new Payment();
        $appointment->service_id = $request->service_id;
        $appointment->provider_id = $request->provider_id;
        $appointment->service_name = $request->service_name;
        $appointment->user_id = auth()->id();
        $appointment->date = $request->date;
        $appointment->time = $request->time;
        $appointment->day = $request->day;
        $appointment->price = $request->price;
        $appointment->bank = $request->bank;
        $appointment->account_no = $request->account_no;

        // Save the appointment to the database
        $appointment->save();
     
        return redirect()->route('apponintment');
    }




    private function generateTimeSlots($startTime, $endTime, $interval)
    {
        $start = Carbon::parse($startTime);
        $end = Carbon::parse($endTime);
        $timeSlots = [];

        while ($start->lte($end)) {
            $timeSlots[] = $start->format('H:i');
            $start->addMinutes($interval);
        }

        return $timeSlots;
    }
}
