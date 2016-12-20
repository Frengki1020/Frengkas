@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Layanan</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Layanan    </div>

    <div class="panel-body">
                

        <form action="{{ url('/layanans') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="id" class="col-sm-3 control-label">Id</label>
            <div class="col-sm-6">
                <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="nama_layanans" class="col-sm-3 control-label">Nama Layanans</label>
            <div class="col-sm-6">
                <input type="text" name="nama_layanans" id="nama_layanans" class="form-control" value="{{$model['nama_layanans'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="harga" class="col-sm-3 control-label">Harga</label>
            <div class="col-sm-6">
                <input type="text" name="harga" id="harga" class="form-control" value="{{$model['harga'] or ''}}" readonly="readonly">
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
                <a class="btn btn-default" href="{{ url('/layanans') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection