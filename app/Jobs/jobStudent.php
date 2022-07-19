<?php

namespace App\Jobs;
use App\Models\Import;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class jobStudent implements ShouldQueue
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
        $email = "/(.+)@hcmut.edu.vn/i";
        $code = "/student_code/i";
        $compare_code = $this->content[0][2];
        $row = Import::where([
            'id' => $this->id,
        ]);
        $row->update(['status' => 1]);
        if (preg_match($code, $compare_code)) {
            for ($i = 1; $i < count($this->content); $i++) {
                $compare_email = $this->content[$i][3];

                if (preg_match($email, $compare_email)) {
                    Student::create([
                        'last_name' => $this->content[$i][0],
                        'first_name' => $this->content[$i][1],
                        'student_code' => $this->content[$i][2],
                        'department' => $this->content[$i][5],
                        'faculty' => $this->content[$i][6],
                        'address' => $this->content[$i][7],
                        'phone' => $this->content[$i][8],
                        'note' => $this->content[$i][9],
                    ]);
                    $lastId = Student::max('id');

                    User::create([
                        'student_id' => $lastId,
                        'role_id' => 3,
                        'name' => $this->content[$i][1] . " " . $this->content[$i][0],
                        'email' => $this->content[$i][3],
                        'password' => Hash::make($this->content[$i][4]),
                    ]);
                }
            }
            $row->update(['status' => 2]);
        } else {
            $row->update(['status' => 3]);
            $row->update(['note' => 'Header of file.csv was wrong']);
        }
    }
}
