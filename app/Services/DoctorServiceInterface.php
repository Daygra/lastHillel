<?php


namespace App\Services;


interface DoctorServiceInterface
{
    public function returnDoctors();

    public function returnDoctorsSchedules($id);


}
