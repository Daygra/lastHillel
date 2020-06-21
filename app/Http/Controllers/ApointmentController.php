<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Services\PDFService;
use App\Services\PDFServiceInterface;
use Illuminate\Http\Request;

class ApointmentController extends Controller
{
    private $PDFService;
    public function __construct(PDFServiceInterface $PDFService)
    {
        $this->PDFService->$PDFService;
    }

    public function index($url)
    {
       $sc = Schedule::where('url','=' ,$url)->first();
       return view('apointment',compact('sc'));

    }

    public function pdf($id)
    {
        $this->PDFService;

    }

}
