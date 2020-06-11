<?php


namespace App\Services;


use App\Repositories\PatientRepositoryInterface;

class PatientService implements PatientServiceInterface
{

    private $patientRepository;

    public function __construct(PatientRepositoryInterface $patientRepository)
    {
        $this->patientRepository=$patientRepository;
    }

    public function changeSingUpVisitStatus($id)
    {
        $this->patientRepository->changeSingUpVisitStatus($id);
    }

    public function returnPatientSchedule()
    {
     return   $this->patientRepository->getPatientSchedules();
    }
}
