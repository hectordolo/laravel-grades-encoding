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
                    <div class="row" align="right">
                        <div class="col-lg-12">
                            <a href="{{route('subject.encode', [$section, $subject])}}" class = 'btn btn-success'>Edit</a>
                            <a href="{{route('subject.print', [$section, $subject])}}" class = 'btn btn-primary'>Print</a>
                            <a href="{{route('subject.index')}}" type="button" class="btn btn-default" data-dismiss="modal">Cancel</a>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
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
                                        <th style="width:9%">Average Grade</th>
                                        <th style="width:9%">Final Final Grade</th>
                                        <th style="width:9%">Remarks</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @if(!$males)
                                        <tr>
                                            <td colspan="9" align="left">MALE: NO RECORD</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="9" align="left">MALE</td>
                                        </tr>

                                        @foreach($males as $key=>$male)
                                            <div class="col-md-1 col-sm-1 col-xs-12" hidden>
                                                <input type='text' value="{{$male->studentcode}}" name="students[]" class = 'form-control col-xs-12'>
                                            </div>
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{isset($male->studentcode)?$male->studentcode:''}}</td>
                                                <td>{{isset($male->studentname)?$male->studentname:''}}</td>
                                                <td>{{isset($male->prelimgrade)?$male->prelimgrade:''}}</td>
                                                <td>{{isset($male->midtermgrade)?$male->midtermgrade:''}}</td>
                                                <td>{{isset($male->finalgrade)?$male->finalgrade:''}}</td>
                                                <td>{{isset($male->average)?$male->average:''}}</td>
                                                <td>{{isset($male->grade)?$male->grade:''}}</td>
                                                <td>{{isset($male->remarks)?$male->remarks:''}}</td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    @if(!$females)
                                        <tr>
                                            <td colspan="9" align="left">FEMALE: NO RECORD</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="9" align="left">FEMALE</td>
                                        </tr>

                                        @foreach($females as $key=>$female)
                                            <div class="col-md-1 col-sm-1 col-xs-12" hidden>
                                                <input type='text' value="{{$female->studentcode}}" name="students[]" class = 'form-control col-xs-12'>
                                            </div>
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{isset($female->studentcode)?$female->studentcode:''}}</td>
                                                <td>{{isset($female->studentname)?$female->studentname:''}}</td>
                                                <td>{{isset($female->prelimgrade)?$female->prelimgrade:''}}</td>
                                                <td>{{isset($female->midtermgrade)?$female->midtermgrade:''}}</td>
                                                <td>{{isset($female->finalgrade)?$female->finalgrade:''}}</td>
                                                <td>{{isset($female->average)?$female->average:''}}</td>
                                                <td>{{isset($female->grade)?$female->grade:''}}</td>
                                                <td>{{isset($female->remarks)?$female->remarks:''}}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
