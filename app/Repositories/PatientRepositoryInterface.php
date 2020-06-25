<?php


namespace App\Repositories;




use Illuminate\Database\Eloquent\Collection;

interface PatientRepositoryInterface
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
    public function getPatientSchedules(): Collection;
}
