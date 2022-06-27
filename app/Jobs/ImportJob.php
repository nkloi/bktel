<?php

namespace App\Jobs;

use App\Models\Import;
use App\Models\Teacher;
use App\Models\User;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
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
        //
        sleep(5);
        info(storage_path() . $this->path);
        $flag = true;
        $error = false;
        if (($open = fopen(storage_path() .$this->path, "r")) !== FALSE) {
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
                    info($data);
                    $teacher->first_name = $data[2];
                    $teacher->last_name = $data[3];
                    $teacher->teacher_code = $data[4];
                    $teacher->department = $data[5];
                    $teacher->faculty = $data[6];
                    $teacher->address = $data[7];
                    $teacher->phone = $data[8];
                    $teacher->note = $data[9];

                    $user->email = $data[0];
                    $user->name = $teacher->first_name . $teacher->last_name;
                    $user->password = Hash::make($data[1]);
                    $user->role_id = '3';
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
        $this->import->status = 2;
        $this->import->save();
    }
}

