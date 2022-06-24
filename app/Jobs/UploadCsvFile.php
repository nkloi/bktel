<?php

namespace App\Jobs;

use App\Models\imports;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TeachersImport;

class UploadCsvFile implements ShouldQueue
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
        //
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
    
        Excel::import(new TeachersImport, $this->path);

        $this->userimport->update(['status' => 1]);

        // imports::create([

        //     'name' => $file->username,
        //     'path' => $path,

        // ]);

    }
}
