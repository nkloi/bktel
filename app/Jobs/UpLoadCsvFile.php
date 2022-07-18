<?php

namespace App\Jobs;

use App\Models\Import;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Throwable;


class UpLoadCsvFile implements ShouldQueue
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
        $pattern = "/(.+)@hcmut.edu.vn/i";
        $row = Import::where([
            'id' => $this->id,
        ]);
        $row->update(['status' => 1]);
        info($this->content);
        for ($i = 0; $i < count($this->content); $i++) {
            if ($this->content[$i]) {
                $compare = $this->content[$i][3];
                if (preg_match($pattern, $compare)) {
                    Teacher::create([
                        'last_name' => $this->content[$i][0],
                        'first_name' => $this->content[$i][1],
                        'teacher_code' => $this->content[$i][2],
                        'department' => $this->content[$i][5],
                        'faculty' => $this->content[$i][6],
                        'address' => $this->content[$i][7],
                        'phone' => $this->content[$i][8],
                        'note' => $this->content[$i][9],
                    ]);
                    $lastId = Teacher::max('id');
    
                    User::create([
                        'teacher_id' => $lastId,
                        'role_id' => 3,
                        'name' => $this->content[$i][1] . " " . $this->content[$i][0],
                        'email' => $this->content[$i][3],
                        'password' => Hash::make($this->content[$i][4]),
                    ]);
                    
                }
            }
        }
        $row->update(['status' => 2]);
    }
    public function failed(Throwable $exception)
    {
        Import::where([
            'id' => $this->id,
        ])->update(['status' => 3]);
    }
}
