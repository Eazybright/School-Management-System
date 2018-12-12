<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academic;
use App\Program;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function getManageCourse()
    {
        $programs = Program::all();
        $academics  = Academic::orderBy('id', 'DESC')->get();
        return view('courses.manageCourse', compact('programs', 'academics'));
    }

    public function postAcademicYear(Request $request)
    {
        if($request->ajax())
        {
            return response(Academic::create($request->all()));
        }
    }

    public function postProgram(Request $request)
    {
        if($request->ajax())
        {
            return response(Program::create($request->all()));
        }
    }

}
