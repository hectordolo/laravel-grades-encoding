@extends('layouts.app')

@section('page-title')
    Print Grades
@endsection

@section('header-scripts')

    <link href="{{ URL::asset('css/print.css') }}" rel="stylesheet">

    <script type="text/javascript">

        function printPage() {
            window.print();
        }

    </script>

@endsection

@section('page-header')
    Print Subject: {{$subject}}
    <a onclick="printPage()" type="button" class="btn btn-primary no-print">Print</a>
    <a href="{{route('subject.index')}}" type="button" class="btn btn-default no-print" data-dismiss="modal">Cancel</a>
@endsection

@section('page-content')
    <div class="row">
            <div class="row">
                <div class="col-lg-12">
                    <h4 align="center">St. Jude College - Dimasalang</h4>
                    <h5 align="center">Dimasalang Cor. Don Quijote Sts., Sampaloc, Manila</h5>
                    <h5 align="center">Office of the Registrar</h5>
                    <h5 align="center">Student Grades</h5>
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
                                <th style="width:8%" class="grade">Prelim Grade</th>
                                <th style="width:8%" class="grade">Midterm Grade</th>
                                <th style="width:8%" class="grade">Final Grade</th>
                                <th style="width:8%" class="grade">Average Grade</th>
                                <th style="width:8%" class="grade">Final Final Grade</th>
                                <th style="width:8%" class="grade">Remarks</th>
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
                                    <td colspan="9" align="left">FEMALE</td>
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
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-6 col-sm-6 col-xs-6" align="left">
                        <p></p>
                        <p>Print Date: {{$date}}</p>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6" align="center">
                        <p></p>
                        <p>Registrar</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
