<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Welcome to the task</title>
        <style>
            @import url(//fonts.googleapis.com/css?family=Lato:700);

            body {
                margin:0;
                font-family:'Lato', sans-serif;
                text-align:center;
                color: #999;
            }

            .header {
                width: 100%;
                left: 0px;
                top: 5%;
                text-align: left;
                border-bottom: 1px  #999 solid;
            }

            .student-table{
                width:100%;  
            }

            table.student-table th{
                background-color: #C6C6C6;
                text-align: left;
                color: white;
                padding:7px 3px;
                font-weight: 700;
                font-size: 18px;
            }

            table.student-table tr.odd {
                text-align: left;
                padding:5px;
                background-color: #F9F9F9;
            }

            table.student-table td{
                text-align: left;
                padding:5px;
            }

            a, a:visited {
                text-decoration:none;
                color: #999;
            }

            h1 {
                font-size: 32px;
                margin: 16px 0 0 0;
            }
        </style>
    </head>

    <body>
        
        <div class="header">
            <div><img src="/images/logo_sm.jpg" alt="Logo" title="logo"></div>
            <div  style='margin: 10px;  text-align: left'>
                <input type="button" value="Select All"/>
                <input type="button" value="Export"/>
            </div>
        </div>

        <form>

            <div style='margin: 10px; text-align: center;'>
                <table class="student-table">
                    <tr>
                        <th></th>
                        <th>Forename</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>University</th>
                        <th>Course</th>
                    </tr>

                    @if(  count($students) > 0 )
                    @foreach($students as $student)
                    <tr>
                        <td><input type="checkbox" name="studentId" value="{{$student['id']}}"></td>
                        <td style=' text-align: left;'>{{$student['firstname']}}</td>
                        <td style=' text-align: left;'>{{$student['surname']}}</td>
                        <td style=' text-align: left;'>{{$student['email']}}</td>
                        <td style=' text-align: left;'>{{$student['course']['university']}}</td>
                        <td style=' text-align: left;'>{{$student['course']['course_name']}}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" style="text-align: center">Oh dear, no data found.</td>
                    </tr>
                    @endif
                </table>
            </div>

        </form>
        
        
    </body>

</html>
