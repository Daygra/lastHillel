<?php


namespace App\Services;


interface PatientServiceInterface
{
    public function changeSingUpVisitStatus($id);

    public function returnPatientSchedule();
}
