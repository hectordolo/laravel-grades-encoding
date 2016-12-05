<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\GlobalVar;
use App\Models\Subjects;
use App\Models\Registrations;

use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $semester = GlobalVar::where('id', 1)->first();

        $sy = GlobalVar::where('id', 2)->first();

        $raw_subjects = Subjects::where('employeecode', $user->employee_id)
            ->where('semester', $semester->value)
            ->where('schoolyear', $sy->value)
            ->get();

        $total_students = 0;

        $number_of_subjects = 0;

        foreach ($raw_subjects as $subject){

            $raw_students = Registrations::where('sectioncode', $subject->sectioncode)
                ->where('subjectcode', $subject->subjectcode)
                ->get()
                ->count();

            $total_students = $total_students + $raw_students;

            if($raw_students > 0){
                $number_of_subjects = $number_of_subjects + 1;
            }

        }


        return view('home', compact('user', 'semester', 'sy', 'number_of_subjects', 'total_students'));
    }
}
