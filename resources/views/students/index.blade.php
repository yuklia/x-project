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
        <td>@{{ student.forename }}</td>
        <td>@{{ student.surname }}</td>
        <td>@{{ student.email }}</td>
        <td>@{{ student.university }}</td>
        <td>@{{ student.course }}</td>
    </tr>
</table>

@endsection