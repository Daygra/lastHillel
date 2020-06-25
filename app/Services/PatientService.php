<?php


namespace App\Services;


use App\Repositories\PatientRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PatientService implements PatientServiceInterface
{
    /**
     * @var PatientRepositoryInterface
     */
    private $patientRepository;

    /**
     * PatientService constructor.
     * @param PatientRepositoryInterface $patientRepository
     */
    public function __construct(PatientRepositoryInterface $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    /**
     * @param int $id
     * change schedule visit status, generate unique url
     */
    public function changeSingUpVisitStatus(int $id)
    {
        $this->patientRepository->changeSingUpVisitStatus($id);
    }

    /**
     * @return Collection
     * get all patients schedules
     */
    public function returnPatientSchedule()
    {
        return $this->patientRepository->getPatientSchedules();
    }
}
