<?php

namespace App\Http\Controllers\Doctor;


use App\Services\DoctorService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    private $doctorService;

    public function __construct(DoctorService $doctorService)
    {
        $this->doctorService = $doctorService;
    }

    public function scheduleShow()
    {
       $schedules=  $this->doctorService->returnDoctorsSchedules();
        return view('doctor.showSchedule',compact('schedules'));
    }

    public function addSchedule(Request $request)
    {
        $this->doctorService->addShedule($request);
        return redirect(route('schedulesControl'));
    }

    public function deleteSchedule($id)
    {
     $this->doctorService->deleteSchedule($id);
       return redirect(route('schedulesControl'));
    }

}
