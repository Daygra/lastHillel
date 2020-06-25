<?php

namespace App\Console\Commands;

use App\Models\Doctors;
use App\Models\User;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddDoctor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hospital:addDoctor {user_name} {doctor_type}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'addDoctor {user_name} {doctor_type}';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $user_name=$input->getArgument('user_name');
        $doctor_type=$input->getArgument('doctor_type');
        $user = User::where('name','=',$user_name)->first();
        $user->role = 'doctor';
        $user->save();

        $doctor = new Doctors();
        $doctor->user_id = $user->id;
        $doctor->doctors_type = $doctor_type;
        $doctor->save();
        return 0;
    }
}
