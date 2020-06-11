<?php


namespace App\Repositories;


use App\Models\Doctors;
use App\Models\Schedule;
use App\Models\User;

class DoctorRepository implements DoctorRepositoryInterface
{
    private $doctorModel;
    private $userModel;
    private $scheduleModel;

    public function __construct()
    {
        $this->doctorModel=app()->make(Doctors::class);
        $this->userModel=app()->make(User::class);
        $this->scheduleModel=app()->make(Schedule::class);

    }

    public function getAllDoctors()
    {
        return $this->doctorModel->get();
    }


    public function getAvailableDoctorsSchedules($id)
    {
        return  $this->doctorModel->find($id)->doctorsSchedules->where('patient_id','=',null);
    }

    public function getAllDoctorsSchedules()
    {
        return  $this->doctorModel->find(\Auth::id())->doctorsSchedules;
    }

    public function deleteShedule($id)
    {
        $this->scheduleModel->find($id)->delete();
    }

    public function addShedule($data)
    {
        $schedule= new Schedule();
        $schedule->visit=$data;
        $schedule->doctor_id=\Auth::id();
        $schedule->save();
    }
}
