<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{ URL::asset('vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ URL::asset('dist/css/sb-admin-2.css') }}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ URL::asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Grades Encoding Login</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}

                                <fieldset>

                                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">

                                            <input placeholder="Username" id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                            @if ($errors->has('username'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                            @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <input placeholder="Password" id="password" type="password" class="form-control" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                    </div>

                                    <div class="checkbox">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember"> Remember Me
                                                </label>
                                            </div>
                                    </div>

                                    <button type="submit" class="btn btn-lg btn-success btn-block">
                                        Login
                                    </button>

                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{ URL::asset('vendor/metisMenu/metisMenu.min.js') }}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{ URL::asset('dist/js/sb-admin-2.js') }}"></script>

    </body>
</html>