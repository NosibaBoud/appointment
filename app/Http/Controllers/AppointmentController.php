<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\HomeAppointment;
use App\Models\Investigation;
use App\Models\UserInvestigation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        $users = User::with('homeAppointments', 'mytests.investigation')->get();
        return view('admindashboard.appointmentslist', compact('users'));
    }
    public function viewappo($id)
    {
        // Find the appointment by its ID
        $appointment = HomeAppointment::find($id);
    
        if (!$appointment) {
            // Handle the case where the appointment is not found
            return redirect()->route('appointments.index')->withErrors('Appointment not found.');
        }
    
        return view('admindashboard.appointment', compact('appointment'));
    }
    public function create(){
        return view('make appointment');
    }
    public function store(Request $request)
{
    $userid = Auth::user()->id;

    // Retrieve the investigation record for the current user
    $userInvestigation = UserInvestigation::where('user_id', $userid)->first();
    if (!$userInvestigation) {
        return back()->withErrors(['error' => 'No investigation found for this user.']);
    }

    // Create a new HomeAppointment instance
    $info = new HomeAppointment;
    $info->first_name = $request->input('first_name');
    $info->last_name = $request->input('last_name');
    $info->email = $request->input('email');
    $info->phone_number = $request->input('phone_number');
    $info->gender = $request->input('gender');
    $info->address = $request->input('address');
    $info->date = $request->input('date');
    $info->time = $request->input('time');
    $info->user_id = $userid;
    $info->investigation_id = $userInvestigation->id; // Assign the investigation_id

    // Save the appointment
    $info->save();

    return view('make appointment')->with('success', 'Appointment created successfully!');
}

}
