<?php

namespace App\Jobs;

use App\Models\Import;
use App\Models\Student;
use App\Models\User;
use Exception;
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
        info(storage_path() . "\\app\\data\\students.csv");
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
                try {
                    $student = new Student();
                    $user = new User();

                    $student->first_name = $data[config('constants.column_student.first_name')];
                    $student->last_name = $data[config('constants.column_student.last_name')];
                    $student->student_code = $data[config('constants.column_student.student_code')];
                    $student->department = $data[config('constants.column_student.department')];
                    $student->faculty = $data[config('constants.column_student.faculty')];
                    $student->address = $data[config('constants.column_student.address')];
                    $student->phone = $data[config('constants.column_student.phone')];
                    $student->note = $data[config('constants.column_student.note')];

                    $user->email = $data[config('constants.column_student.email')];
                    $user->name = $student->first_name . $student->last_name;
                    $user->password = Hash::make($data[config('constants.column_student.password')]);
                    $user->role_id = config('constants.role.role_student.id');
                    $user->save();

                    $student->save();
                    $student->user()->save($user);
                    $student->save();
                    info($student);
                    info($user);
                } catch (Exception $e) {
                    info($e->getMessage());
                    $error = true;
                }
            }
            fclose($open);
        }
        $this->import->status = $error ? 3 : 2;
        $this->import->save();
    }
}