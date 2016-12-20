@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Booking</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Booking    </div>

    <div class="panel-body">
                

        <form action="{{ url('/bookings') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="id" class="col-sm-3 control-label">Id</label>
            <div class="col-sm-6">
                <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="id_users" class="col-sm-3 control-label">Id Users</label>
            <div class="col-sm-6">
                <input type="text" name="id_users" id="id_users" class="form-control" value="{{$model['id_users'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="tgl_pangkas" class="col-sm-3 control-label">Tgl Pangkas</label>
            <div class="col-sm-6">
                <input type="text" name="tgl_pangkas" id="tgl_pangkas" class="form-control" value="{{$model['tgl_pangkas'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="waktu_pangkas" class="col-sm-3 control-label">Waktu Pangkas</label>
            <div class="col-sm-6">
                <input type="text" name="waktu_pangkas" id="waktu_pangkas" class="form-control" value="{{$model['waktu_pangkas'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="id_layanans" class="col-sm-3 control-label">Id Layanans</label>
            <div class="col-sm-6">
                <input type="text" name="id_layanans" id="id_layanans" class="form-control" value="{{$model['id_layanans'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="lokasi" class="col-sm-3 control-label">Lokasi</label>
            <div class="col-sm-6">
                <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{$model['lokasi'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="created_at" class="col-sm-3 control-label">Created At</label>
            <div class="col-sm-6">
                <input type="text" name="created_at" id="created_at" class="form-control" value="{{$model['created_at'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="updated_at" class="col-sm-3 control-label">Updated At</label>
            <div class="col-sm-6">
                <input type="text" name="updated_at" id="updated_at" class="form-control" value="{{$model['updated_at'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/bookings') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection