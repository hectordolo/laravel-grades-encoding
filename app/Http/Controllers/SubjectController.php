<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\GlobalVar;
use App\Models\Subjects;
use App\Models\Registrations;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Support\Facades\Input;

class SubjectController extends Controller
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

    public function index(){

        $user = Auth::user();

        $semester = GlobalVar::where('id', 1)->first();

        $sy = GlobalVar::where('id', 2)->first();

        $raw_subjects = Subjects::where('employeecode', $user->employee_id)
            ->where('semester', $semester->value)
            ->where('schoolyear', $sy->value)
            ->get();

        $subjects = [];

        foreach ($raw_subjects as $subject){

            $days = '';

            $from = '';

            $to = '';

            if(!empty($subject->days)){

                $raw_days = str_split($subject->days);

                foreach ($raw_days as $day){
                    if($day == 1){
                        $days = $days.'Sun';
                    }elseif($day == 2){
                        $days = $days.'M';
                    }elseif($day == 3){
                        $days = $days.'T';
                    }elseif($day == 4){
                        $days = $days.'W';
                    }elseif($day == 5){
                        $days = $days.'Th';
                    }elseif($day == 6){
                        $days = $days.'F';
                    }else{
                        $days = $days.'Sat';
                    }
                }

            }

            if(!empty($subject->promtime)){

                if($subject->promtime == '1.00'){
                    $from = '1:00 AM';
                }elseif($subject->promtime == '1.30'){
                    $from = '1:30 AM';
                }elseif($subject->promtime == '2.00'){
                    $from = '2:00 AM';
                }elseif($subject->promtime == '2.30'){
                    $from = '2:30 AM';
                }elseif($subject->promtime == '3.00'){
                    $from = '3:00 AM';
                }elseif($subject->promtime == '3.30'){
                    $from = '3:30 AM';
                }elseif($subject->promtime == '4.00'){
                    $from = '4:00 AM';
                }elseif($subject->promtime == '4.30'){
                    $from = '4:30 AM';
                }elseif($subject->promtime == '5.00'){
                    $from = '5:00 AM';
                }elseif($subject->promtime == '5.30'){
                    $from = '5:30 AM';
                }elseif($subject->promtime == '6.00'){
                    $from = '6:00 AM';
                }elseif($subject->promtime == '6.30'){
                    $from = '6:30 AM';
                }elseif($subject->promtime == '7.00'){
                    $from = '7:00 AM';
                }elseif($subject->promtime == '7.30'){
                    $from = '7:30 AM';
                }elseif($subject->promtime == '8.00'){
                    $from = '8:00 AM';
                }elseif($subject->promtime == '8.30'){
                    $from = '8:30 AM';
                }elseif($subject->promtime == '9.00'){
                    $from = '9:00 AM';
                }elseif($subject->promtime == '9.30'){
                    $from = '9:30 AM';
                }elseif($subject->promtime == '10.00'){
                    $from = '10:00 AM';
                }elseif($subject->promtime == '10.30'){
                    $from = '10:30 AM';
                }elseif($subject->promtime == '11.00'){
                    $from = '11:00 AM';
                }elseif($subject->promtime == '11.30'){
                    $from = '11:30 AM';
                }elseif($subject->promtime == '12.00'){
                    $from = '12:00 AM';
                }elseif($subject->promtime == '12.30'){
                    $from = '12:30 PM';
                }elseif($subject->promtime == '13.00'){
                    $from = '1:00 PM';
                }elseif($subject->promtime == '13.30'){
                    $from = '1:30 PM';
                }elseif($subject->promtime == '14.00'){
                    $from = '2:00 PM';
                }elseif($subject->promtime == '14.30'){
                    $from = '2:30 PM';
                }elseif($subject->promtime == '15.00'){
                    $from = '3:00 PM';
                }elseif($subject->promtime == '15.30'){
                    $from = '3:30 PM';
                }elseif($subject->promtime == '16.00'){
                    $from = '4:00 PM';
                }elseif($subject->promtime == '16.30'){
                    $from = '4:30 PM';
                }elseif($subject->promtime == '17.00'){
                    $from = '5:00 PM';
                }elseif($subject->promtime == '17.30'){
                    $from = '5:30 PM';
                }elseif($subject->promtime == '18.00'){
                    $from = '6:00 PM';
                }elseif($subject->promtime == '18.30'){
                    $from = '6:30 PM';
                }elseif($subject->promtime == '19.00'){
                    $from = '7:00 PM';
                }elseif($subject->promtime == '19.30'){
                    $from = '7:30 PM';
                }elseif($subject->promtime == '20.00'){
                    $from = '8:00 PM';
                }elseif($subject->promtime == '20.30'){
                    $from = '8:30 PM';
                }elseif($subject->promtime == '21.00'){
                    $from = '9:00 PM';
                }elseif($subject->promtime == '21.30'){
                    $from = '9:30 PM';
                }elseif($subject->promtime == '22.00'){
                    $from = '10:00 PM';
                }elseif($subject->promtime == '22.30'){
                    $from = '10:30 PM';
                }elseif($subject->promtime == '23.00'){
                    $from = '11:00 PM';
                }elseif($subject->promtime == '23.30'){
                    $from = '11:30 PM';
                }elseif($subject->promtime == '24.00'){
                    $from = '12:00 AM';
                }else{
                    $from = '12:30 AM';
                }

            }

            if(!empty($subject->tootime)){

                if($subject->tootime == 1.00){
                    $to = '1:00 AM';
                }elseif($subject->tootime == 1.30){
                    $to = '1:30 AM';
                }elseif($subject->tootime == 2.00){
                    $to = '2:00 AM';
                }elseif($subject->tootime == 2.30){
                    $to = '2:30 AM';
                }elseif($subject->tootime == 3.00){
                    $to = '3:00 AM';
                }elseif($subject->tootime == 3.30){
                    $to = '3:30 AM';
                }elseif($subject->tootime == 4.00){
                    $to = '4:00 AM';
                }elseif($subject->tootime == 4.30){
                    $to = '4:30 AM';
                }elseif($subject->tootime == 5.00){
                    $to = '5:00 AM';
                }elseif($subject->tootime == 5.30){
                    $to = '5:30 AM';
                }elseif($subject->tootime == 6.00){
                    $to = '6:00 AM';
                }elseif($subject->tootime == 6.30){
                    $to = '6:30 AM';
                }elseif($subject->tootime == 7.00){
                    $to = '7:00 AM';
                }elseif($subject->tootime == 7.30){
                    $to = '7:30 AM';
                }elseif($subject->tootime == 8.00){
                    $to = '8:00 AM';
                }elseif($subject->tootime == 8.30){
                    $to = '8:30 AM';
                }elseif($subject->tootime == 9.00){
                    $to = '9:00 AM';
                }elseif($subject->tootime == 9.30){
                    $to = '9:30 AM';
                }elseif($subject->tootime == 10.00){
                    $to = '10:00 AM';
                }elseif($subject->tootime == 10.30){
                    $to = '10:30 AM';
                }elseif($subject->tootime == 11.00){
                    $to = '11:00 AM';
                }elseif($subject->tootime == 11.30){
                    $to = '11:30 AM';
                }elseif($subject->tootime == 12.00){
                    $to = '12:00 AM';
                }elseif($subject->tootime == 12.30){
                    $to = '12:30 PM';
                }elseif($subject->tootime == 13.00){
                    $to = '1:00 PM';
                }elseif($subject->tootime == 13.30){
                    $to = '1:30 PM';
                }elseif($subject->tootime == 14.00){
                    $to = '2:00 PM';
                }elseif($subject->tootime == 14.30){
                    $to = '2:30 PM';
                }elseif($subject->tootime == 15.00){
                    $to = '3:00 PM';
                }elseif($subject->tootime == 15.30){
                    $to = '3:30 PM';
                }elseif($subject->tootime == 16.00){
                    $to = '4:00 PM';
                }elseif($subject->tootime == 16.30){
                    $to = '4:30 PM';
                }elseif($subject->tootime == 17.00){
                    $to = '5:00 PM';
                }elseif($subject->tootime == 17.30){
                    $to = '5:30 PM';
                }elseif($subject->tootime == 18.00){
                    $to = '6:00 PM';
                }elseif($subject->tootime == 18.30){
                    $to = '6:30 PM';
                }elseif($subject->tootime == 19.00){
                    $to = '7:00 PM';
                }elseif($subject->tootime == 19.30){
                    $to = '7:30 PM';
                }elseif($subject->tootime == 20.00){
                    $to = '8:00 PM';
                }elseif($subject->tootime == 20.30){
                    $to = '8:30 PM';
                }elseif($subject->tootime == 21.00){
                    $to = '9:00 PM';
                }elseif($subject->tootime == 21.30){
                    $to = '9:30 PM';
                }elseif($subject->tootime == 22.00){
                    $to = '10:00 PM';
                }elseif($subject->tootime == 22.30){
                    $to = '10:30 PM';
                }elseif($subject->tootime == 23.00){
                    $to = '11:00 PM';
                }elseif($subject->tootime == 23.30){
                    $to = '11:30 PM';
                }elseif($subject->tootime == 24.00){
                    $to = '12:00 AM';
                }else{
                    $to = '12:30 AM';
                }

            }

            $raw_students = Registrations::where('sectioncode', $subject->sectioncode)
                ->where('subjectcode', $subject->subjectcode)
                ->get()
                ->count();

            if($raw_students > 0){
                $subjects[] = (object)['sectioncode'=> $subject->sectioncode,
                    'subjectcode' => $subject->subjectcode,
                    'days'=>$days,
                    'room'=>$subject->roomcode,
                    'from'=>$from,
                    'to'=>$to,
                    'students'=>$raw_students];
            }
        }

        return view('subject.index', compact('subjects'));
    }

    public function printing($section, $subject){

        $carbon = Carbon::now()->addHour(8);

        $date = $carbon->toDayDateTimeString();

        $males = [];

        $females = [];

        $students = DB::connection('mysql_two')->table('registrations')
            ->join('students', 'registrations.studentcode', '=', 'students.studentcode')
            ->select('registrations.prelimgrade', 'registrations.midtermgrade', 'registrations.finalgrade', 'registrations.studentcode', 'students.lname', 'students.fname', 'students.sex', 'students.mname')
            ->where('registrations.sectioncode', $section)
            ->where('registrations.subjectcode', $subject)
            ->orderBy('students.lname', 'ASC')
            ->get();

        foreach($students as $student){

            $average = round(($student->prelimgrade+$student->midtermgrade+$student->finalgrade)/3, 2);

            if($average >= 97 && $average <= 100){
                $grade = 1.00;
                $remarks = 'PASSED';
            }elseif($average >= 94 && $average <= 96){
                $grade = 1.25;
                $remarks = 'PASSED';
            }elseif($average >= 91 && $average <= 93){
                $grade = 1.50;
                $remarks = 'PASSED';
            }elseif($average >= 88 && $average <= 90){
                $grade = 1.75;
                $remarks = 'PASSED';
            }elseif($average >= 85 && $average <= 87){
                $grade = 2.00;
                $remarks = 'PASSED';
            }elseif($average >= 82 && $average <= 84){
                $grade = 2.25;
                $remarks = 'PASSED';
            }elseif($average >= 79 && $average <= 81){
                $grade = 2.50;
                $remarks = 'PASSED';
            }elseif($average >= 76 && $average <= 78){
                $grade = 2.75;
                $remarks = 'PASSED';
            }elseif($average == 75){
                $grade = 3.00;
                $remarks = 'PASSED';
            }else{
                $remarks = 'FAILED';
                $grade = '5.00';
            }

            if($student->sex==1){
                $males[] = (object)['studentcode'=>$student->studentcode,
                    'studentname'=>$student->lname.', '.$student->fname,
                    'prelimgrade'=>$student->prelimgrade,
                    'midtermgrade'=>$student->midtermgrade,
                    'finalgrade'=>$student->finalgrade,
                    'average' => $average,
                    'grade' => $grade,
                    'remarks' => $remarks];
            }else{
                $females[] = (object)['studentcode'=>$student->studentcode,
                    'studentname'=>$student->lname.', '.$student->fname,
                    'prelimgrade'=>$student->prelimgrade,
                    'midtermgrade'=>$student->midtermgrade,
                    'finalgrade'=>$student->finalgrade,
                    'average' => $average,
                    'grade' => $grade,
                    'remarks' => $remarks];
            }
        }

        return view('subject.print', compact('section', 'subject', 'males','females', 'date'));
    }

    public function view($section, $subject){

        $males = [];

        $females = [];

        $students = DB::connection('mysql_two')->table('registrations')
            ->join('students', 'registrations.studentcode', '=', 'students.studentcode')
            ->select('registrations.prelimgrade', 'registrations.midtermgrade', 'registrations.finalgrade', 'registrations.studentcode', 'students.lname', 'students.fname', 'students.sex', 'students.mname')
            ->where('registrations.sectioncode', $section)
            ->where('registrations.subjectcode', $subject)
            ->orderBy('students.lname', 'ASC')
            ->get();

        foreach($students as $student){

            $average = round(($student->prelimgrade+$student->midtermgrade+$student->finalgrade)/3, 2);

            $grade = 0;

            if($average >= 97 && $average <= 100){
                $grade = 1.00;
            }elseif($average >= 94 && $average <= 96){
                $grade = 1.25;
            }elseif($average >= 91 && $average <= 93){
                $grade = 1.50;
            }elseif($average >= 88 && $average <= 90){
                $grade = 1.75;
            }elseif($average >= 85 && $average <= 87){
                $grade = 2.00;
            }elseif($average >= 82 && $average <= 84){
                $grade = 2.25;
            }elseif($average >= 79 && $average <= 81){
                $grade = 2.50;
            }elseif($average >= 76 && $average <= 78){
                $grade = 2.75;
            }elseif($average == 75){
                $grade = 3.00;
            }else{
                $grade = 'Failed';
            }

            if($student->sex==1){
                $males[] = (object)['studentcode'=>$student->studentcode,
                    'studentname'=>$student->lname.', '.$student->fname,
                    'prelimgrade'=>$student->prelimgrade,
                    'midtermgrade'=>$student->midtermgrade,
                    'finalgrade'=>$student->finalgrade,
                    'average' => $average,
                    'grade' => $grade];
            }else{
                $females[] = (object)['studentcode'=>$student->studentcode,
                    'studentname'=>$student->lname.', '.$student->fname,
                    'prelimgrade'=>$student->prelimgrade,
                    'midtermgrade'=>$student->midtermgrade,
                    'finalgrade'=>$student->finalgrade,
                    'average' => $average,
                    'grade' => $grade];
            }
        }

        return view('subject.view', compact('section', 'subject', 'males','females'));
    }

    public function encode($section, $subject){

        $males = [];

        $females = [];

        $students = DB::connection('mysql_two')->table('registrations')
            ->join('students', 'registrations.studentcode', '=', 'students.studentcode')
            ->select('registrations.prelimgrade', 'registrations.midtermgrade', 'registrations.finalgrade', 'registrations.studentcode', 'students.lname', 'students.fname', 'students.sex', 'students.mname')
            ->where('registrations.sectioncode', $section)
            ->where('registrations.subjectcode', $subject)
            ->orderBy('students.lname', 'ASC')
            ->get();

        foreach($students as $student){



            if($student->sex==1){
                $males[] = (object)['studentcode'=>$student->studentcode,
                                    'studentname'=>$student->lname.', '.$student->fname,
                                    'prelimgrade'=>$student->prelimgrade,
                                    'midtermgrade'=>$student->midtermgrade,
                                    'finalgrade'=>$student->finalgrade];
            }else{
                $females[] = (object)['studentcode'=>$student->studentcode,
                                    'studentname'=>$student->lname.', '.$student->fname,
                                    'prelimgrade'=>$student->prelimgrade,
                                    'midtermgrade'=>$student->midtermgrade,
                                    'finalgrade'=>$student->finalgrade];
            }
        }

        return view('subject.encode', compact('section', 'subject', 'males','females'));
    }

    public function update(Request $request){

        $students = $request->get('students');
        $subject = $request->get('subject');
        $section = $request->get('section');

        $prelimgrades = $request->get('prelimgrade');
        $midtermgrades = $request->get('midtermgrade');
        $finalgrades = $request->get('finalgrade');

        foreach($students as $key=>$student){

            $registration = Registrations::where('sectioncode', $section)
                ->where('studentcode', $student)
                ->where('subjectcode', $subject)
                ->update(array(
                    'prelimgrade' => !empty($prelimgrades[$student])?$prelimgrades[$student]: null,
                    'midtermgrade' => !empty($midtermgrades[$student])?$midtermgrades[$student]: null,
                    'finalgrade' => !empty($finalgrades[$student])?$finalgrades[$student]:null
                ));

        }

        flash('Grades Updated.', 'success');
        return redirect()->route('subject.encode',[$section, $subject]);

    }
}