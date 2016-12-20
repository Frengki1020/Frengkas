@extends('layouts.app')

@section('content')
<div class="container" align="center">
    <div class="panel-group col-md-6 col-md-offset-3">
        <div class="panel panel-info">
            <div class="panel-heading" style="background-color: #d4145a; color: #ffffff"><label style="font-size: 15pt">Register</label></div>
            <div class="panel-body col-md-12"> 
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('no_hp') ? ' has-error' : '' }}">
                            <label for="no_hp" class="col-md-4 control-label">No. Handphone</label>

                            <div class="col-md-6">
                                <input id="no_hp" type="integer" class="form-control" name="no_hp" value="{{ old('no_hp') }}" required autofocus>

                                @if ($errors->has('no_hp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_hp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tgl_lahir') ? ' has-error' : '' }}">
                            <label for="tgl_lahir" class="col-md-4 control-label">Tanggal Lahir</label>

                            <div class="col-md-6">
                                <input id="tgl_lahir" class="form-control" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required autofocus>

                                @if ($errors->has('tgl_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-danger" style="background-color: #d4145a; color: #ffffff">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
<script>
  $(function() {
    $( "#tgl_lahir" ).datepicker({ dateFormat: 'yy-mm-dd' });
  });
  </script>
@endsection
