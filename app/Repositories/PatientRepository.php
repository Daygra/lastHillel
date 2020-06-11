<?php


namespace App\Repositories;

use App\Models\Schedule;
use App\Models\User;




class PatientRepository implements PatientRepositoryInterface
{
    private $scheduleModel;
    private $patientModel;

    public function __construct()
    {
        $this->scheduleModel= app()->make(Schedule::class);
        $this->patientModel= app()->make(User::class);

    }

    public function changeSingUpVisitStatus($id)
  {

    $schedule =  $this->scheduleModel->findOrFail($id);
    if ($schedule->patient_id==null)
    {
        $schedule->patient_id = \Auth::id();
        $url = md5(uniqid(rand(),1));
        $schedule->url=$url;
    }
        else {
            $schedule->patient_id = null;
            $schedule->url=null;

        }
        $schedule->save();
  }

    public function getPatientSchedules()
    {

        return $this->patientModel->find(\Auth::id())->patientSchedules;
    }


}
