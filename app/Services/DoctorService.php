<?php


namespace App\Services;

use App\Repositories\DoctorRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;


class DoctorService implements DoctorServiceInterface
{
    /**
     * @var DoctorRepositoryInterface
     */
    private $doctorRepository;

    /**
     * DoctorService constructor.
     * @param DoctorRepositoryInterface $doctorRepository
     */
    public function __construct(DoctorRepositoryInterface $doctorRepository)
    {
        $this->doctorRepository = $doctorRepository;
    }

    /**
     * @return Collection
     * get all doctors from doctors table
     */
    public function returnDoctors() :Collection
    {
        return $this->doctorRepository->getAllDoctors();
    }

    /**
     * @param null $id
     * @return Collection
     * get available or all doctors schedules
     */
    public function returnDoctorsSchedules($id = null): Collection
    {
        if ($id == null)
            return $this->doctorRepository->getAllDoctorsSchedules();
        else
            return $this->doctorRepository->getAvailableDoctorsSchedules($id);
    }

    /**
     * @param int $id
     * @throws \Exception
     * delete schedule by id
     */
    public function deleteSchedule(int $id)
    {
        $this->doctorRepository->deleteShedule($id);
    }

    /**
     * @param Request $request
     * add new schedule
     */
    public function addShedule(Request $request)
    {
        $data = $request->dataTime;

        $this->doctorRepository->addShedule($data);
    }


}
