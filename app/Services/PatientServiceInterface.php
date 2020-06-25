<?php


namespace App\Services;


use Illuminate\Database\Eloquent\Collection;

interface PatientServiceInterface
{
    /**
     * @param int $id
     * change schedule visit status, generate unique url
     */
    public function changeSingUpVisitStatus(int $id);

    /**
     * @return Collection
     * get all patients schedules
     */
    public function returnPatientSchedule();
}
