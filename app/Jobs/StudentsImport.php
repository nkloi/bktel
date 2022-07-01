<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Imports\UsersStudentsImport;
use Maatwebsite\Excel\Facades\Excel;
use Throwable;

class StudentsImport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
   
    public $path;
    public $userimport;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($path, $userimport)
    {
        $this->path = $path;
        $this->userimport = $userimport;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $result = false;

        $this->userimport->update(['status' => 1]);
        
        Excel::import(new UsersStudentsImport, $this->path);

        $this->userimport->update(['status' => 2]);

    }
    public function failed(Throwable $exception)
    {
        $this->userimport->update(['status' => 3]);
    }
}