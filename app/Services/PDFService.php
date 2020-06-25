<?php


namespace App\Services;


use App\Models\Schedule;
use App\Repositories\DoctorRepository;

class PDFService implements PDFServiceInterface
{

    /**
     * @var DoctorRepository
     */
    private $doctorRepository;

    /**
     * @var \Barryvdh\DomPDF\PDF
     */
    private $pdf;

    /**
     * PDFService constructor.
     * @param DoctorRepository $doctorRepository
     */
    public function __construct(DoctorRepository $doctorRepository)
    {
        $this->doctorRepository = $doctorRepository;
        $this->pdf = \App::make('dompdf.wrapper');
    }

    /**
     * @param $id
     * @param $url
     * @return \Illuminate\Http\Response
     */
    public function makePDF($id, $url)
    {
        $html = $this->renderHTML($id);
        $this->pdf->loadHTML($html)->setPaper('a6', 'landscape');
        return $this->pdf->download('Ваш Талон('."$url".').pdf');
    }

    /**
     * @param $id
     * @return Schedule
     */
    private function getData($id): Schedule
    {
        return $this->doctorRepository->findSheduleById($id);

    }

    /**
     * @param $id
     * @return string
     */
    private function renderHTML($id): string
    {
        $schedule = $this->getData($id);
        $nameD = $schedule->doctorsSchedules->userName->name;
        $nameP = $schedule->patient->name;
        $date = $schedule->visit;
        $html = "<body>
                  <ul>
                    <li><h2>Талон на прием к врачу</h2></li>
                    <li>Доктор:  $nameD</li>
                    <li>Пациент: $nameP</li>
                    <li>Время приема: $date</li>
                    <li><img src=\"https://goo.su/1IpI\" </li>
                   </ul>
              </body>
              <style>
                    body { font-family: DejaVu Sans, sans-serif; }
                    li {list-style-type: none; }
                    img {height: 90px;}
              </style>";

        return $html;

    }
}
