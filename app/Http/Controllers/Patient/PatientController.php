<?php


namespace App\Http\Controllers\Patient;


use App\Http\Controllers\Controller;
use App\Services\DoctorServiceInterface;
use App\Services\PatientServiceInterface;
use Illuminate\Http\Request;




class PatientController extends Controller
{
    private $doctorService;

    private $patientService;

    public function __construct(DoctorServiceInterface $doctorService, PatientServiceInterface $patientService)
    {
        $this->doctorService = $doctorService;
        $this->patientService = $patientService;
    }

    public function showDoctors()
    {
        $doctors = $this->doctorService->returnDoctors();
        return view('patient.doctors',compact('doctors'));
    }

    public function showDoctorsSchedule($id)
    {
        $schedules = $this->doctorService->returnDoctorsSchedules($id);
        return view('patient.doctorsSchedule',compact('schedules'));
    }

    public function changeSingUpStatus($id)
    {
       $this->patientService->changeSingUpVisitStatus($id);

        return redirect(route('appointments'));
    }
    public function showAppointments()
    {
        $appointments = $this->patientService->returnPatientSchedule();
        return view('patient.appointments',compact('appointments'));
    }



























  /*  public function showDoctors()
    {
       $doctors = $this->hospitalService->returnAllDoctorsInfo();
       return view('patient.doctors',compact('doctors'));
    }

    public function showDoctorsSchedule($id)
    {
        $schedules = $this->hospitalService->returnDoctorSchedule($id);
        return view('patient.doctorsSchedule',compact('schedules'));
    }

    public function changeSingUpStatus($id)
    {
        $this->hospitalService->changeSingUpStatus($id);
        return redirect(route('our.doctors'));
    }

    public function showAppointments()
    {
        $appointments = $this->hospitalService->returnPatientAppointments();
        return view('patient.appointments',compact('appointments'));
    }


*/




















    /*public function index()
    {
       $doctors= Role::where('role', 'Doctor')->first()->userRole;

      dd($doctors);
        return view('patient.doctors',compact('doctors'));
    }
    public function show($id)
    {
        $chs=User::find($id)->doctorSchedules->where('pasient_id','=',null);
      return view('patient.doctorsSc',compact('chs'));
    }
    public function zapic($id)
    {
        $cchedule=Schedule::findOrFail($id);
        $cchedule->pasient_id=\Auth::id();
        $cchedule->save();
        return redirect(route('home'));
    }
    public function showMyzapic()
    {
        $uchs=User::find(\Auth::id())->pasientSchedules;
        return view('patient.pasientallzapic',compact('uchs'));
    }*/

}
