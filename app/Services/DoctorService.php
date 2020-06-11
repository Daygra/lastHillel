<?php


namespace App\Services;




use App\Repositories\DoctorRepositoryInterface;
use Composer\DependencyResolver\Request;

class DoctorService implements DoctorServiceInterface
{
    private $doctorRepository;

    public function __construct(DoctorRepositoryInterface $doctorRepository)
    {
        $this->doctorRepository=$doctorRepository;
    }

    public function returnDoctors()
    {
            return $this->doctorRepository->getAllDoctors();
    }

    public function returnDoctorsSchedules($id=null)
    {
        if ($id==null)
            return $this->doctorRepository->getAllDoctorsSchedules();
            else
        return $this->doctorRepository->getAvailableDoctorsSchedules($id);
    }

    public function deleteSchedule($id)
    {
        $this->doctorRepository->deleteShedule($id);
    }

    public function addShedule($request)
    {
        $data=$request->dataTime;

        $this->doctorRepository->addShedule($data);
    }

}
