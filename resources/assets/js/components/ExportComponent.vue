<template>
    <div class="header">
        <div><img src="/images/logo_sm.jpg" alt="Logo" title="logo"></div>
        <div style='margin: 10px;  text-align: left'>
            <input type="button" value="Select All"/>
            <form action="/export-all">
                <input type="submit" value="Export All"/>
            </form>

            <form action="/export-course-attendance">
                <input type="submit" value="Export Course Attendance"/>
            </form>

        </div>
    </div>
</template>
