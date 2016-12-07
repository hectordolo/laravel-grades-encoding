@extends('layouts.app')

@section('page-header')
    Subject Lists
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
                                <th style="width:15%">Section Code</th>
                                <th>Subject Code</th>
                                <th style="width:10%">Days</th>
                                <th style="width:15%">Time</th>
                                <th style="width:10%">Room</th>
                                <th style="width:5%">Students</th>
                                <th style="width:15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subjects as $key=>$subject)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{isset($subject->sectioncode)?$subject->sectioncode:''}}</td>
                                    <td>{{isset($subject->subjectcode)?$subject->subjectcode:''}}</td>
                                    <td>{{isset($subject->days)?$subject->days:''}}</td>
                                    <td>{{!empty($subject->from)?$subject->from.' - ':''}}{{isset($subject->to)?$subject->to:''}}</td>
                                    <td>{{isset($subject->room)?$subject->room:''}}</td>
                                    <td>{{isset($subject->students)?$subject->students:''}}</td>
                                    <td>
                                        <a href="{{route('subject.view', [$subject->sectioncode, $subject->subjectcode])}}" type="button" class="btn btn-default btn-sm" title="View" ><i class="fa fa-file-o"></i></a>
                                        <a href="{{route('subject.encode', [$subject->sectioncode, $subject->subjectcode])}}" type="button" class="btn btn-default btn-sm" title="Encode" ><i class="fa fa-edit"></i></a>
                                        <a href="{{route('subject.print', [$subject->sectioncode, $subject->subjectcode])}}" type="button" class="btn btn-default btn-sm" title="Print" ><i class="fa fa-print"></i></a>
                                    </td>
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
