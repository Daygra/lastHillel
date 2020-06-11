<?php


namespace App\Repositories;


interface PatientRepositoryInterface
{
    public function changeSingUpVisitStatus($id);

     public function getPatientSchedules();
}
