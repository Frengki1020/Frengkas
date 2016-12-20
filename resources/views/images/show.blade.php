@extends('crudgenerator::layouts.master')

@section('content')



<h2 class="page-header">Image</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        View Image    </div>

    <div class="panel-body">
                

        <form action="{{ url('/images') }}" method="POST" class="form-horizontal">


                
        <div class="form-group">
            <label for="id" class="col-sm-3 control-label">Id</label>
            <div class="col-sm-6">
                <input type="text" name="id" id="id" class="form-control" value="{{$model['id'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="file" class="col-sm-3 control-label">File</label>
            <div class="col-sm-6">
                <input type="text" name="file" id="file" class="form-control" value="{{$model['file'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="caption" class="col-sm-3 control-label">Caption</label>
            <div class="col-sm-6">
                <input type="text" name="caption" id="caption" class="form-control" value="{{$model['caption'] or ''}}" readonly="readonly">
            </div>
        </div>
        
                
        <div class="form-group">
            <label for="description" class="col-sm-3 control-label">Description</label>
            <div class="col-sm-6">
                <input type="text" name="description" id="description" class="form-control" value="{{$model['description'] or ''}}" readonly="readonly">
            </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <a class="btn btn-default" href="{{ url('/images') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
            </div>
        </div>


        </form>

    </div>
</div>







@endsection