<?php


namespace App\Services;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;


interface DoctorServiceInterface
{
    /**
     * @return Collection
     * get all doctors from doctors table
     */
    public function returnDoctors() :Collection;

    /**
     * @param null $id
     * @return Collection
     * get available or all doctors schedules
     */
    public function returnDoctorsSchedules($id = null): Collection;

    /**
     * @param int $id
     * @throws \Exception
     * delete schedule by id
     */
    public function deleteSchedule(int $id);

    /**
     * @param Request $request
     * add new schedule
     */
    public function addShedule(Request $request);

}
