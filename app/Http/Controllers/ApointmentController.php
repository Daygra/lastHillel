<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ApointmentController extends Controller
{
    public function index($url)
    {
       $sc = Schedule::where('url','=' ,$url)->first();
       dd($sc);

    }
}
