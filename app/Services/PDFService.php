<?php


namespace App\Services;


use App\Repositories\DoctorRepository;

class PDFService implements PDFServiceInterface
{

    private $doctorRepository;
    private $pdf;

    public function __construct(DoctorRepository $doctorRepository)
    {
        $this->doctorRepository=$doctorRepository;
     //   $this->pdf=\App::make('dompdf.wrapper');
    }


    public function makePDF($id)
   {
       $html=$this->renderHTML($id);
      $this->pdf->loadHTML($html)->setPaper('a6','landscape');
       return $this->pdf->download('Ваш Талон.pdf');
   }

   public function getData($id)
   {
      return $this->doctorRepository->findSheduleById($id);

   }

   public function renderHTML($id)
   {
       $schedule= $this->getData($id);
       $html="            <ul>
                         <li>Доктор:</li>
                        <li>{{$schedule->doctorsSchedules->userName->name}}</li>
                        <li>Пациент:</li>
                        <li>{{$schedule->patient->name}}</li>
                        <li>Время приема:</li>
                        <li>{{$schedule->visit}}</li>
                        </ul>";

       return $html;

   }
}
