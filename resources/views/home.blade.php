@extends('layouts.app')

@section('page-header')
    Dashboard
@endsection

@section('page-content')

    <div class="row">

        <div class="col-lg-4 col-md-6">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-left">
                            <div>Hello! <strong>{{(isset($user->sex)?$user->sex=='M'?'MR. ':'MS. ':'')}}{{isset($user->first_name)?strtoupper($user->first_name):''}} {{isset($user->last_name)?strtoupper($user->last_name):''}}</strong>,<br> this application lets you encode the grades of your student into the system. Enjoy Encoding!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-2">
                            <i class="fa fa-calendar fa-5x"></i>
                        </div>
                        <div class="col-xs-10 text-right">
                            <div class="huge">{{isset($sy)?$sy->value:''}} {{isset($semester)?$semester->value:''}}</div>
                            <div>Current School Year & Semester</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-group fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{isset($total_students)?$total_students:''}}</div>
                            <div>Total Students</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-book fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{isset($number_of_subjects)?$number_of_subjects:''}}</div>
                            <div>Total Subjects</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-star   fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{isset($number_of_subjects)?$number_of_subjects:''}}</div>
                            <div>Encoded Subjects</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-star-half-empty fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{isset($number_of_subjects)?$number_of_subjects:''}}</div>
                            <div>Partially Encoded</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-star-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{isset($number_of_subjects)?$number_of_subjects:''}}</div>
                            <div>Not Encoded Subjects</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
