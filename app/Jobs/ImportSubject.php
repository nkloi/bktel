<?php

namespace App\Jobs;

use App\Models\Import;
use App\Models\Subject;
use App\Models\User;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;

class ImportSubject implements ShouldQueue
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
        info(storage_path() . "\\app\\data\\subjects.csv");
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
                    $subject = new Subject();
                    $user = new User();

                    
                    $subject->name = $data[config('constants.column_subject.name')];
                    $subject->code = $data[config('constants.column_subject.code')];
                    $subject->note = $data[config('constants.column_subject.note')];

                    $user->email = $data[config('constants.column_subject.email')];
                    $user->name = $subject->name;
                    $user->password = Hash::make($data[config('constants.column_subject.password')]);
                    $user->role_id = config('constants.role.role_subject.id');
                    $user->save();

                    $subject->save();
                    $subject->user()->save($user);
                    $subject->save();
                    info($subject);
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