<?php

namespace App\Jobs;

use App\Models\Import;
use App\Models\Student;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;

class ImportStudent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $path, $name, $import;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($path, $name, Import $import)
    {
        $this->path = $path;
        $this->name = $name;
        $this->import = $import;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        sleep(5);
        info(storage_path() . "\\app\\data\\teachers.csv");
        $flag = true;
        $error = false;
        if (($open = fopen(storage_path() . '\\' . $this->path, "r")) !== FALSE) {
            $this->import->status = 1;
            $this->import->save();
            while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                if ($flag) {
                    $flag = false;
                    continue;
                }
                info($data);
                    $student = new Student();
                    $user = new User();
                    info($data);
                    $student->first_name = $data[2];
                    $student->last_name = $data[3];
                    $student->student_code = $data[4];
                    $student->department = $data[5];
                    $student->faculty = $data[6];
                    $student->address = $data[7];
                    $student->phone = $data[8];
                    $student->note = $data[9];

                    $user->email = $data[0];
                    $user->name = $student->first_name . $student->last_name;
                    $user->password = Hash::make($data[1]);
                    $user->role_id = 4;
                    $user->save();

                    $student->save();
                    $student->user()->save($user);
                    $student->save();
                    info($student);
                    info($user);

            }
            fclose($open);
        }
        $this->import->status = 2;
        $this->import->save();
    }
}