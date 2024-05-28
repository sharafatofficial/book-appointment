<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\category;
use App\Models\Appointment;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $auth_id=auth()->id();
        $categories=category::where('isactive','1')->where('user_id',$auth_id)->get();
        
        return view('backend.services.add',compact('categories'));
    }

    public function store(Request $request)
    {
    
        $validatedData = $request->validate([
            'service_name' => 'required|string|max:255',
            'service_description' => 'nullable|string',
            'category_id' => 'required|integer',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
            'days' => 'required',
            'start_time'=>'required',
            'end_time'=>'required',
            'availability' => 'required|boolean',
            'image_url' => 'nullable|image|max:2048',
        ]);

        $service = new Service();
        $service->service_name = $validatedData['service_name'];
        $service->service_description = $validatedData['service_description'];
        $service->category_id = $validatedData['category_id'];
        $service->price = $validatedData['price'];
        $service->duration = $validatedData['duration'];
        $service->availability = $validatedData['availability'];
        $service->start_time = $validatedData['start_time'];
        $service->end_time = $validatedData['end_time'];

        $service->user_id = auth()->id();
        $unique_code = substr(str_shuffle("0123456789"), 0, 5);
        $service->service_code = $unique_code;
        $days=$validatedData['days'];
        $days_str = implode(",", $days);
        $service->days=$days_str;
        if (request()->hasFile('image_url')) {
            $file = request()->file('image_url');
            $imageName = time().'.'.request()->image_url->getClientOriginalExtension();
            request()->image_url->move(public_path('images'), $imageName);
        }
        $service->image_url= $imageName;
        $service->save();

        return redirect()->back()->with('success', 'Service created successfully');
    }

    public function show()
    {
        $auth_id=auth()->id();
        $services = Service::where('user_id',$auth_id)->get();
        
        return view('backend.services.view',compact('services'));
        
    }

    public function delete($id)
    {
        Service::find($id)->delete();

         return redirect()->back()->with('success', 'Service created successfully');
    }

    public function update($id)
    {
        $auth_id=auth()->id();
        $service=Service::where('id',$id)->first();
        $categories=category::where('isactive','1')->where('user_id', $auth_id)->get();
        return view('backend.services.edit',compact('service','categories'));
    }

    public function edit(Request $request ,$id)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'service_name' => 'required|string|max:255',
            'service_description' => 'nullable|string',
            'category_id' => 'required|integer',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
            'days' => 'required',
            'start_time'=>'required',
            'end_time'=>'required',
            'availability' => 'required|boolean',
            'image_url' => 'nullable|image|max:2048',
        ]);

        $service = Service::find($id);
        $service->service_name = $validatedData['service_name'];
        $service->service_description = $validatedData['service_description'];
        $service->category_id = $validatedData['category_id'];
        $service->price = $validatedData['price'];
        $service->duration = $validatedData['duration'];
        $service->availability = $validatedData['availability'];
        $service->start_time = $validatedData['start_time'];
        $service->end_time = $validatedData['end_time'];
        $service->user_id = auth()->id();
        $unique_code = substr(str_shuffle("0123456789"), 0, 5);
        $service->service_code = $unique_code;
        $days=$validatedData['days'];
        $days_str = implode(",", $days);
        $service->days=$days_str;
        if (request()->hasFile('image_url')) {
            $file = request()->file('image_url');
            $imageName = time().'.'.request()->image_url->getClientOriginalExtension();
            request()->image_url->move(public_path('images'), $imageName);
            $service->image_url= $imageName;
        }
       
        $service->update();

        return redirect()->route('view.service')->with('success', 'Service Updated successfully');
        
    }


    function upcoming(){
        $auth_id=auth()->id();
        $appointment=Appointment::where('provider_id',$auth_id)->where('status','0')->get();
        //  dd($appointment);
         return view('backend.appointments.upcoming',compact('appointment'));
    }

    function history(){
        $auth_id=auth()->id();
        $appointment=Appointment::where('provider_id',$auth_id)->where('status','1')->get();
        //  dd($appointment);
         return view('backend.appointments.history',compact('appointment'));
    }

    function deliver($id){
        Appointment::find($id)->update(['status'=>1]);
        return redirect()->back();
    }
   
}
