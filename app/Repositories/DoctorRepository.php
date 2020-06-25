<?php


namespace App\Repositories;


use App\Models\Doctors;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class DoctorRepository implements DoctorRepositoryInterface
{
    /**
     * @var Doctors $doctorModel
     * @var User $userModel
     * @var Schedule $scheduleModel
     *
     */

    private $doctorModel;
    private $userModel;
    private $scheduleModel;

    public function __construct()
    {
        $this->doctorModel = app()->make(Doctors::class);
        $this->userModel = app()->make(User::class);
        $this->scheduleModel = app()->make(Schedule::class);

    }

    /**
     * @return Collection
     * get all doctors from doctors table
     */
    public function getAllDoctors(): Collection
    {
        return $this->doctorModel->get();
    }

    /**
     * @param int $id
     * @return Collection
     * get an affordable schedule to the doctor
     */
    public function getAvailableDoctorsSchedules(int $id): Collection
    {
        return $this->doctorModel->find($id)->doctorsSchedules->where('patient_id', '=', null);
    }

    /**
     * @return Collection
     * get auth doctors schedule
     */
    public function getAllDoctorsSchedules(): Collection
    {
        return $this->userModel->find(\Auth::id())->doctors->doctorsSchedules;
    }

    /**
     * @param int $id
     * @throws \Exception
     * delete schedule by id
     */
    public function deleteShedule(int $id)
    {
        $this->findSheduleById($id)->delete();
    }

    /**
     * @param int $id
     * @return Schedule
     * find schedule by id
     */
    public function findSheduleById(int $id): Schedule
    {
        return $this->scheduleModel->find($id);
    }

    /**
     * @param string $data
     * add new schedule
     */
    public function addShedule(string $data)
    {
        $schedule = new Schedule();
        $schedule->visit = $data;
        $schedule->doctor_id = \Auth::id();
        $schedule->save();
    }
}
