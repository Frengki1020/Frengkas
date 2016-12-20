@extends('layouts.dashboard')

@section('content')

<h2 class="page-header">Layanan</h2>

<div class="panel panel-default">
    <div class="panel-heading">Add/Modify Layanan</div>
        <div class="panel-body">
            <form action="{{ url('/layanans'.( isset($model) ? "/" . $model->id : "")) }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                @if (isset($model))
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                <label for="id" class="col-sm-3 control-label">Id</label>
                <div class="col-sm-6">
                    <input type="text" name="id" id="id" class="form-control" value="{{ isset( $model->id) or ''}}" readonly="readonly">
                </div>
            </div>
                @endif


            
            <div class="form-group">
                <label for="nama_layanans" class="col-sm-3 control-label">Nama Layanans</label>
                <div class="col-sm-6">
                    <input type="text" name="nama_layanans" id="nama_layanans" class="form-control" value="{{ isset($model->nama_layanans) ? $model->nama_layanans : ''}}">
                </div>
            </div>
            <div class="form-group">
                <label for="harga" class="col-sm-3 control-label">Harga</label>
                <div class="col-sm-6">
                    <input type="text" name="harga" id="harga" class="form-control" value="{{ isset($model->harga) ? $model->harga : ''}}">
                </div>
            </div>                                                 
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Save
                    </button> 
                    <a class="btn btn-default" href="{{ url('/layanans') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
                </div>
            </div>
        </form>
    </div>
</div>






@endsection