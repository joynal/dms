@extends('app')
@section('content')

    <div class="row">
        <div class="col-lg-2">
            <div class="text-center">Admin Logged</div>
            <br>
            <ul class="list-group">
                <li class="list-group-item">Generate ID</li>
                <li class="list-group-item">Offer Courses</li>
                <li class="list-group-item">Class Routine</li>
                <li class="list-group-item">Exam Routine</li>
                <li class="list-group-item">Publish Result</li>
                <li class="list-group-item">Report</li>
            </ul>
        </div>
        <div class="col-lg-10">
            <h4>Student List</h4>
            <table class="table">
                <tr>
                    <th>Student Id</th>
                    <th>Student Name</th>
                    <th>Student Batch</th>
                    <th>Student Section</th>
                    <th>Created Date</th>
                </tr>
                <tr>
                    <td>M21132111002</td>
                    <td>Sabbir Rahman</td>
                    <td>25th</td>
                    <td>A</td>
                    <td>12th September, 2011</td>
                </tr>
                <tr>
                    <td>F21132111004</td>
                    <td>Marzia</td>
                    <td>25th</td>
                    <td>A</td>
                    <td>12th September, 2011</td>
                </tr>
                <tr>
                    <td>M21132111010</td>
                    <td>Dolon</td>
                    <td>25th</td>
                    <td>A</td>
                    <td>12th September, 2011</td>
                </tr>
                <tr>
                    <td>M21132111002</td>
                    <td>Mashrafee</td>
                    <td>25th</td>
                    <td>A</td>
                    <td>12th September, 2011</td>
                </tr>
                <tr>
                    <td>M21132111002</td>
                    <td>Mashrafee</td>
                    <td>25th</td>
                    <td>A</td>
                    <td>12th September, 2011</td>
                </tr>
                <tr>
                    <td>M21132111002</td>
                    <td>Mashrafee</td>
                    <td>25th</td>
                    <td>A</td>
                    <td>12th September, 2011</td>
                </tr>
                <tr>
                    <td>M21132111002</td>
                    <td>Mashrafee</td>
                    <td>25th</td>
                    <td>A</td>
                    <td>12th September, 2011</td>
                </tr>
            </table>
        </div>
    </div>
@endsection