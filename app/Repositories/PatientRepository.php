<?php


namespace App\Repositories;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;


class PatientRepository implements PatientRepositoryInterface
{
    private $scheduleModel;
    private $patientModel;

    public function __construct()
    {
        $this->scheduleModel = app()->make(Schedule::class);
        $this->patientModel = app()->make(User::class);

    }

    /**
     * @param int $id
     * change schedule visit status, generate unique url
     */
    public function changeSingUpVisitStatus(int $id)
    {

        $schedule = $this->scheduleModel->findOrFail($id);
        if ($schedule->patient_id == null) {
            $schedule->patient_id = \Auth::id();
            $url = md5(uniqid(rand(), 1));
            $schedule->url = $url;
        } else {
            $schedule->patient_id = null;
            $schedule->url = null;

        }
        $schedule->save();
    }

    /**
     * @return Collection
     * get all patients schedules
     */
    public function getPatientSchedules(): Collection
    {
        return $this->patientModel->find(\Auth::id())->patientSchedules;
    }


}
