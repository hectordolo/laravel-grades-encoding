@extends('layouts.app')

@section('page-header')
    Viewing Subject: {{$subject}}
@endsection

@section('page-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of Subjects
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="width:5%">#</th>
                                <th style="width:15%">Student Code</th>
                                <th>Student Name</th>
                                <th style="width:9%">Prelim Grade</th>
                                <th style="width:9%">Midterm Grade</th>
                                <th style="width:9%">Final Grade</th>
                                <th style="width:9%">Final Average</th>
                                <th style="width:10%">Grade</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $key=>$student)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
