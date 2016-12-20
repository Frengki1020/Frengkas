@extends('layouts.dashboard')

@section('content')
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <!-- <span class="label label-success pull-right">Monthly</span> -->
                    <h5>Income</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">
                        {{ $totalIncome }}
                    </h1>
                    <!-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> -->
                    <small>Total income</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <!-- <span class="label label-info pull-right">Annual</span> -->
                    <h5>Orders</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ count($bookings) }}</h1>
                    <!-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> -->
                    <small>Total orders</small>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>List of {{ ucfirst('bookings') }}</h5>
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
                        <th>ID</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal Pangkas</th>
                        <th>Waktu Pangkas</th>
                        <th>Layanan</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($bookings as $booking)
                        <tr class="gradeX">
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->id_users }}</td>
                        <td>{{ $booking->tgl_pangkas }}</td>
                        <td>{{ $booking->waktu_pangkas }}</td>
                        <td>{{ $booking->id_layanans }}</td>
                        <td>{{ $booking->lokasi }}</td>
                        <td>
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
                        </td>
                        <td>
                            <div class="btn-toolbar" align="center">
                                @if ($booking->status == 0)
                                    <a href="{{ url('bookings/diterima') }}/{{ $booking->id }}" class="btn btn-success">Terima</a>
                                    <a href="{{ url('bookings/ditolak') }}/{{ $booking->id }}" class="btn btn-danger">Tolak</a>
                                @endif
                                @if ($booking->status != 4 && $booking->status != 2 && $booking->status != 3)
                                    <a href="{{ url('bookings/done') }}/{{ $booking->id }}" class="btn btn-info">Done</a>
                                @endif
                                @if ($booking->status == 4)
                                    <a href="{{ url('bookings/pdf') }}/{{ $booking->id }}" class="btn btn-default">Cetak</a>
                                @endif

                                <!-- <button type="button" >Terima</button> -->
                                <!-- <button type="button" class="btn btn-danger">Tolak</button> -->
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