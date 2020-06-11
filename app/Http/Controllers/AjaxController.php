<?php
namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AjaxController extends Controller {
    public function index(Request $request){
        dd($this->showSc());
        $role= $this->showUserRole();
        return view('message',compact('role'));
      //  return response()->json(array('data'=> $request['lol']), 200);
    }
    private function showUserRole(){
        return User::findorfail(\Auth::id())->role->role;

    }
    private function getAllDoctors()
    {
        return Role::where('role', 'DoctorController')->first()->user;

    }
    private function showSc()
    {
        return Schedule::where('doctor_id', '1')->priem;
    }
}
