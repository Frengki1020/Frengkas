@extends('layouts.app')

@section('content')



<div class="container" align="center">
    <div>
        <p>
            <a href="{{ url('bookings/create') }}" class="btn btn-primary btn-lg">Request</a>
        </p>
    </div>

    @foreach($bookings as $booking) 
    <div class="panel-group col-md-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <label>{{ $booking->tgl_pangkas }}</label>
                <label>
                @if ($booking->status == 1 || $booking->status == 0)
                    <a style="margin-left: 20px" href="{{ url('bookings/batal') }}/{{ $booking->id }}" class="btn btn-danger btn-xs">Batal</a>
                @elseif ($booking->status == 4)
                    <a style="margin-left: 20px" href="{{ url('bookings/pdf') }}/{{ $booking->id }}" class="btn btn-default btn-xs">View Invoice</a>
                @endif
                </label>
            </div>
            <div class="panel-body">
                <div class="">
                    <!-- <p>{{ $booking->tgl_pangkas }}</p> -->
                    <p>{{ $booking->waktu_pangkas }}</p>
                    <p>{{ $booking->id_layanans }}</p>
                    <p>{{ $booking->lokasi }}</p>
                    <p>
                        @if ($booking->status == 0)
                            <span class='label label-warning'>Diproses</span>
                        @elseif ($booking->status == 1)
                            <span class='label label-primary'>Diterima</span>
                        @elseif ($booking->status == 2)
                            <span class='label label-danger'>Ditolak</span>
                        @elseif ($booking->status == 4)
                            <span class='label label-info'>Service Selesai</span>
                        @else
                            <span class='label label-info'>Batal</span>
                        @endif
                    </p>
                   
                       <!--  <a href="{{ url('bookings/batal') }}/{{ $booking->id }}" class="btn btn-danger disabled">Batal</a> -->
                </div>
                <!-- <div class="">
                    <table class="table table-striped" id="thegrid">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Id Users</th>
                                <th>Tgl Pangkas</th>
                                <th>Waktu Pangkas</th>
                                <th>Id Layanans</th>
                                <th>Lokasi</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th style="width:50px"></th>
                                <th style="width:50px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <a href="{{url('bookings/create')}}" class="btn btn-primary" role="button">Add booking</a> -->
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection



@section('scripts')
    <script type="text/javascript">
        var theGrid = null;
        $(document).ready(function(){
            theGrid = $('#thegrid').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": true,
                "responsive": true,
                "ajax": "{{url('bookings/grid')}}",
                "columnDefs": [
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/bookings') }}/'+row[0]+'">'+data+'</a>';
                        },
                        "targets": 1
                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="{{ url('/bookings') }}/'+row[0]+'/edit" class="btn btn-default">Update</a>';
                        },
                        "targets": 8                    },
                    {
                        "render": function ( data, type, row ) {
                            return '<a href="#" onclick="return doDelete('+row[0]+')" class="btn btn-danger">Delete</a>';
                        },
                        "targets": 8+1
                    },
                ]
            });
        });
        function doDelete(id) {
            if(confirm('You really want to delete this record?')) {
               $.ajax({ url: '{{ url('/bookings') }}/' + id, type: 'DELETE'}).success(function() {
                theGrid.ajax.reload();
               });
            }
            return false;
        }
    </script>
@endsection