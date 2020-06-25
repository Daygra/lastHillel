<?php


namespace App\Repositories;


use App\Models\Schedule;
use Illuminate\Database\Eloquent\Collection;

interface DoctorRepositoryInterface
{
    /**
     * @return Collection|null
     * get all doctors from doctors table
     */
    public function getAllDoctors(): ?Collection;

    /**
     * @param int $id
     * @return Collection
     * get an affordable schedule to the doctor
     */
    public function getAvailableDoctorsSchedules(int $id): Collection;

    /**
     * @return Collection
     * get auth doctors schedule
     */
    public function getAllDoctorsSchedules(): Collection;

    /**
     * @param int $id
     * @throws \Exception
     * delete schedule by id
     */
    public function deleteShedule(int $id);

    /**
     * @param string $data
     * add new schedule
     */
    public function addShedule(string $data);

    /**
     * @param int $id
     * @return Schedule
     * find schedule by id
     */
    public function findSheduleById(int $id): Schedule;

}
