@extends('layouts.main')
@section('content')

<export-component></export-component>

<div class="alert alert-info" role="alert" v-if="students.length == 0">
    No students yet.
</div>

<table class="table table-bordered" v-else>
    <tr>
        <th>Forename</th>
        <th>Surname</th>
        <th>Email</th>
        <th>University</th>
        <th>Course</th>
    </tr>
    <tr v-for="student in students">
        <td class="item">@{{ student.firstname }}</td>
        <td class="item">@{{ student.surname }}</td>
        <td class="item">@{{ student.email }}</td>
        <td class="item">@{{ student.course.university }}</td>
        <td class="item">@{{ student.course.course_name }}</td>
    </tr>
</table>

@endsection