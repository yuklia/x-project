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
        $data = Student::all()->toArray();
        $fileName = sprintf('students_%s', date('Y-m-d'));
        return $this->export($fileName, $data);
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

        $fileName = sprintf('course_attendance_%s', date('Y-m-d'));
        return $this->export($fileName, $result);
    }

    protected function export($fileName, $data)
    {
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = array_keys((array)array_shift($data));

        $callback = function () use ($data, $columns) {
            $file = fopen('php://output', 'w');

            fputcsv($file, $columns);

            array_map(function ($item) use ($file) {
                fputcsv($file, array_values((array)$item));
            }, $data);

            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }
}
