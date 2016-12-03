<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\GlobalVar;
use App\Models\Subjects;

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

    public function index($section, $subject){

        return view('subject.index', compact('section', 'subject'));
    }

    public function encode($section, $subject){

        return view('subject.encode', compact('section', 'subject'));
    }
}