@extends('layouts.dashboard')

@section('content')


<h2 class="page-header">Image</h2>

<div class="panel panel-default">
    <div class="panel-heading">
        Add/Modify Image    </div>

    <div class="panel-body">
               
        <form action="{{ url('/images'.( isset($model) ? "/" . $model->id : "")) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
            {{ csrf_field() }}

            @if (isset($model))
                <input type="hidden" name="_method" value="PATCH">
            @endif


            <!-- <div class="form-group">
                <label for="id" class="col-sm-3 control-label">Id</label>
                <div class="col-sm-6">
                    <input type="text" name="id" id="id" class="form-control" value="{{ isset($model['id']) or ''}}" readonly="readonly">
                </div>
            </div> -->
            <div class="form-group">
                        <label for="file" class="control-label col-md-3">Upload Photo</label>
                        <div class="col-md-6">
                            <input type="file" name="file" id="file" class="form-control">
                        </div>
            </div>
            <div class="form-group">
                <label for="caption" class="col-sm-3 control-label">Caption</label>
                <div class="col-sm-6">
                    <input type="text" name="caption" id="caption" class="form-control" value="{{ isset($model['caption']) or ''}}">
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-sm-3 control-label">Description</label>
                <div class="col-sm-6">
                    <input type="text" name="description" id="description" class="form-control" value="{{ isset($model['description']) or ''}}">
                </div>
            </div>
                        
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Save
                    </button> 
                    <a class="btn btn-default" href="{{ url('/images') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
                </div>
            </div>
        </form>

    </div>
</div>






@endsection