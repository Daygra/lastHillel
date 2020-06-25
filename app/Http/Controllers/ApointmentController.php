<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Services\PDFServiceInterface;

class ApointmentController extends Controller
{
    private $PDFService;

    public function __construct(PDFServiceInterface $PDFService)
    {
        $this->PDFService = $PDFService;
    }

    public function index($url)
    {
        $sc = Schedule::where('url', '=', $url)->first();
        return view('apointment', compact('sc'));

    }

    public function pdf($id, $url)
    {
        return $this->PDFService->makePDF($id,$url);

    }

}
