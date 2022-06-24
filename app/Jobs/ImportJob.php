<?php

namespace App\Jobs;

use App\Models\Import;
use App\Models\Teacher;
use App\Models\User;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;

class ImportJob implements ShouldQueue
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
        if (($open = fopen(storage_path() . "/app/data/teachers.csv", "r")) !== FALSE) {
            $this->import->status = 1;
            $this->import->save();
            while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                if ($flag) {
                    $flag = false;
                    continue;
                }
                try {
                    $teacher = new Teacher();
                    $user = new User();

                    $teacher->first_name = $data[config('constants.column_teacher.first_name')];
                    $teacher->last_name = $data[config('constants.column_teacher.last_name')];
                    $teacher->teacher_code = $data[config('constants.column_teacher.teacher_code')];
                    $teacher->department = $data[config('constants.column_teacher.department')];
                    $teacher->faculty = $data[config('constants.column_teacher.faculty')];
                    $teacher->address = $data[config('constants.column_teacher.address')];
                    $teacher->phone = $data[config('constants.column_teacher.phone')];
                    $teacher->note = $data[config('constants.column_teacher.note')];

                    $user->email = $data[config('constants.column_teacher.email')];
                    $user->name = $teacher->first_name . $teacher->last_name;
                    $user->password = Hash::make($data[config('constants.column_teacher.password')]);
                    $user->role_id = config('constants.role.role_teacher.id');
                    $user->save();

                    $teacher->save();
                    $teacher->user()->save($user);
                    $teacher->save();
                    info($teacher);
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
