@extends('layouts.dashboard')

@section('content')


<h2 class="page-header">{{ ucfirst('service hours') }}</h2>

<div class="row">
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div style="margin-top: 5px"> <a href="{{url('service_hours/create')}}" class="btn btn-primary" role="button">Tambah Service Hour</a></div>
        <div class="ibox-title">

            <h5>List {{ ucfirst('layanan') }}</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-wrench"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#">Config option 1</a>
                    </li>
                    <li><a href="#">Config option 2</a>
                    </li>
                </ul>
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">

        <table class="table table-striped table-bordered table-hover dataTables-example" >
        <thead>
        <tr>
            <th>Id</th>
            <th>Hours</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($service_hours as $service_hour)
            <tr class="gradeX">
            <td>{{ $service_hour->id }}</td>
            <td>{{ $service_hour->hours }}</td>
            <td width="100px">
                        <div class="btn-toolbar" align="center" >
                            <form class="delete" action="{{ route('service_hours.destroy',$service_hour->id) }}" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <input class="btn btn-danger" type="submit" value="Delete">
                                </form>
                            <script>
                                function ConfirmDelete()
                                {
                                    var x = confirm("Are you sure you want to delete?");
                                    if (x)
                                        exit;
                                    else
                                        exit;
                                }
                                $(".delete").on("submit", function(){
                                    return ConfirmDelete();
                                });
                            </script>
                        </div>
                    </td>
        </tr>
        @endforeach
        </tbody>
        </table>
        </div>
    </div>
</div>




@endsection

