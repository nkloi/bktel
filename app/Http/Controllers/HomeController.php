<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;


class HomeController extends Controller
{
    public $image_name, $name, $id, $path;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->id = Auth::user()->id;
            $path = User::where('id', $this->id)->get()[0]['profile_image_url'];
            $this->path = $path;
            $this->image_name = substr(substr($path, strpos($path, "/") + 1), strpos(substr($path, strpos($path, "/") + 1), "/"));
            $this->name = User::where('id', $this->id)->get()[0]['name'];
            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['image_name' => $this->image_name, 'name' => $this->name]);
    }
    public function student_form(Request $request)
    {
        $current_userid = Auth::user()->id;
        $check = User::where('id', $current_userid)->get();
        if ($check[0]["student_id"] == NULL || $check[0]["role_id"] != 4) {
            return view('student_form', ['image_name' => $this->image_name, 'name' => $this->name]);
        } else {
            return redirect()->route('home');
        }
    }
    public function teacher_form()
    {

        return view('teacher_form', ['image_name' => $this->image_name, 'name' => $this->name]);
    }
    public function add_student()
    {

        return view('addstudent');
    }
    public function add_subject()
    {

        return view('addsubject', ['image_name' => $this->image_name, 'name' => $this->name]);
    }
    public function teacher_subject()
    {

        return view('teacher_subject', ['image_name' => $this->image_name, 'name' => $this->name]);
    }
    public function upload_proimage(Request $request)
    {
        return view('upload_proimage', ['image_name' => $this->image_name, 'name' => $this->name]);
    }
    public function save_proimage(Request $request)
    {
        $user = new User;
        try {
            if ($user->where('id', Auth::user()->id)->get()[0]["role_id"] == 4) {
                $student_code = $user->join('students', 'students.id', 'users.student_id')
                    ->where('users.id', Auth::user()->id)
                    ->get()[0]["student_code"];
            } else {
                $teacher_code = $user->join('teachers', 'teachers.id', 'users.teacher_id')
                    ->where('users.id', Auth::user()->id)
                    ->get()[0]["teacher_code"];
            }
            if (isset($student_code)) {
                $user_code = $student_code;
            } else {
                $user_code = $teacher_code;
            }
        } catch (Exception $e) {
            $user_code = 'ADMIN';
        }
        $file = $request->file("file");
        $original_name = $file->getClientOriginalName();
        if (pathinfo($original_name)["extension"] == 'jpg' || pathinfo($original_name)["extension"] == 'png') {
            if ($this->image_name != NULL) {
                unlink(storage_path('app\\public\\profile_image\\' . substr($this->image_name, strpos($this->image_name, "/") + 1)));
            }
            $name = $user_code . '_' . date('Ymd_His') . '.' . pathinfo($original_name)["extension"];
            $path = $file->storeAs('public/profile_image', $name);
            $user->where('id', Auth::user()->id)->update(['profile_image_url' => $path]);
            return redirect()->route('home');
        } else {
            return 'fail';
        }
    }
}
