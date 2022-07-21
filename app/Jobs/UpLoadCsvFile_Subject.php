<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Import;
use App\Models\Subject;
use Throwable;

class UpLoadCsvFile_Subject implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $content, $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($content, $id)
    {
        $this->content = $content;
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $code = "/code/i";
        $compare_code = $this->content[0][1];
        $row = Import::where([
            'id' => $this->id,
        ]);
        $row->update(['status' => 1]);
        if (preg_match($code, $compare_code)) {
            for ($i = 1; $i < count($this->content); $i++) {
                if ($this->content[$i]){
                Subject::create([
                    'name' => $this->content[$i][0],
                    'code' => $this->content[$i][1],
                    'note' => $this->content[$i][2],
                ]);
            }
        }
            $row->update(['status' => 2]);
        } else {
            $row->update(['status' => 3]);
            $row->update(['note' => 'Header of file.csv was wrong']);
        }
    }
    public function failed(Throwable $exception)
    {
        Import::where([
            'id' => $this->id,
        ])->update(['status' => 3, 'note' => 'Data of file.csv was wrong']);
    }
    
}
