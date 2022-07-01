<?php

namespace App\Jobs;

use App\Models\Import;
use App\Models\Subject;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

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
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
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
                    $subject = new Subject();
                    info($data);
                    $subject->name = $data[0];
                    $subject->code = $data[1];
                    $subject->note = $data[2];

                    $subject->save();

                    info($subject);
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
