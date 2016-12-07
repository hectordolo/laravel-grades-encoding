@extends('layouts.app')

@section('page-header')
    Encoding Subject: {{$subject}}
@endsection

@section('page-content')

    @include('flash::message')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of Subjects
                </div>

                <div class="panel-body">
                    {!! Form::open(['route' => ['subject.update']]) !!}
                        <div class="row" align="right">
                            <div class="col-lg-12">
                                {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                                <a href="{{route('subject.view',[$section, $subject])}}" type="button" class="btn btn-primary" data-dismiss="modal">View</a>
                                <a href="{{route('subject.index')}}" type="button" class="btn btn-default" data-dismiss="modal">Cancel</a>

                            </div>
                            <div class="col-md-1 col-sm-1 col-xs-12" hidden>
                                <input type='text' value="{{$subject}}" name="subject" class = 'form-control col-xs-12'>
                                <input type='text' value="{{$section}}" name="section" class = 'form-control col-xs-12'>
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
                                            <th style="width:15%">Prelim Grade</th>
                                            <th style="width:15%">Midterm Grade</th>
                                            <th style="width:15%">Final Grade</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @if(!$males)
                                            <tr>
                                                <td colspan="1" align="left">MALE</td>
                                                <td colspan="5" align="center">NO RECORD</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="1" align="left">MALE</td>
                                                <td colspan="5" align="center"></td>
                                            </tr>

                                            @foreach($males as $key=>$male)
                                                <div class="col-md-1 col-sm-1 col-xs-12" hidden>
                                                    <input type='text' value="{{$male->studentcode}}" name="students[]" class = 'form-control col-xs-12'>
                                                </div>
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{isset($male->studentcode)?$male->studentcode:''}}</td>
                                                    <td>{{isset($male->studentname)?$male->studentname:''}}</td>
                                                    <td><input type='text' value="{{isset($male->prelimgrade)?$male->prelimgrade:''}}" name="prelimgrade[{{$male->studentcode}}]" class = 'form-control'></td>
                                                    <td><input type='text' value="{{isset($male->midtermgrade)?$male->midtermgrade:''}}" name="midtermgrade[{{$male->studentcode}}]" class = 'form-control'></td>
                                                    <td><input type='text' value="{{isset($male->finalgrade)?$male->finalgrade:''}}" name="finalgrade[{{$male->studentcode}}]" class = 'form-control'></td>
                                                </tr>
                                            @endforeach
                                        @endif

                                        @if(!$females)
                                            <tr>
                                                <td colspan="1" align="left">FEMALE</td>
                                                <td colspan="5" align="center">NO RECORD</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="1" align="left">FEMALE</td>
                                                <td colspan="5" align="center"></td>
                                            </tr>

                                            @foreach($females as $key=>$female)
                                                <div class="col-md-1 col-sm-1 col-xs-12" hidden>
                                                    <input type='text' value="{{$female->studentcode}}" name="students[]" class = 'form-control col-xs-12'>
                                                </div>
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{isset($female->studentcode)?$female->studentcode:''}}</td>
                                                    <td>{{isset($female->studentname)?$female->studentname:''}}</td>
                                                    <td><input type='text' value="{{isset($female->prelimgrade)?$female->prelimgrade:''}}" name="prelimgrade[{{$female->studentcode}}]" class = 'form-control'></td>
                                                    <td><input type='text' value="{{isset($female->midtermgrade)?$female->midtermgrade:''}}" name="midtermgrade[{{$female->studentcode}}]" class = 'form-control'></td>
                                                    <td><input type='text' value="{{isset($female->finalgrade)?$female->finalgrade:''}}" name="finalgrade[{{$female->studentcode}}]" class = 'form-control'></td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
