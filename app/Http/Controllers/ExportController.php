<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Support\Facades\DB;

class ExportController extends Controller
{
    public function welcome()
    {
        return view('hello');
    }

    /**
     * Exports all student data to a CSV file
     */
    public function exportStudentsToCSV()
    {
        $students = Student::all()->toArray();

        $formattedData = formatDataForCSV($students);
        $now = date('Y-m-d');

        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=students_$now.csv");
        header("Pragma: no-cache");
        header("Expires: 0");

        echo $formattedData;
        exit;
    }

    /**
     * Exports the total amount of students that are taking each course to a CSV file
     */
    public function exportCourseAttendanceToCSV()
    {
        $result = DB::table('students')
        ->join('courses', 'students.course_id', '=', 'courses.id')
        ->select(DB::raw('course_name, count(students.id) as total'))
        ->groupBy('course_name')
        ->get()->toArray();

        $formattedData = formatDataForCSV($result);
        $now = date('Y-m-d');

        header("Content-type: text/csv");
        header("Content-Disposition: attachment; filename=course_attendance_$now.csv");
        header("Pragma: no-cache");
        header("Expires: 0");

        echo $formattedData;
        exit;
    }
}
