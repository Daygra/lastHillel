<?php


namespace App\Repositories;


interface DoctorRepositoryInterface
{
    public function  getAllDoctors();

    public function getAvailableDoctorsSchedules($id);

    public function  getAllDoctorsSchedules();

    public function deleteShedule($id);

    public function addShedule($data);

}
