@extends('layouts.app')

@section('content')


<div class="container" align="center">
    <div class="panel-group col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading"><label style="font-size: 15pt">Create New {{ ucfirst('bookings') }}</label></div>
            <div class="panel-body">
                
                <form action="{{ url('/bookings'.( isset($model) ? "/" . $model->id : "")) }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    @if (isset($model))
                        <input type="hidden" name="_method" value="PATCH">
                    @endif
                    <div class="form-group{{ $errors->has('tgl_pangkas') ? ' has-error' : '' }}">
                        <label for="tgl_pangkas" class="col-sm-3 control-label">Tanggal Pangkas</label>
                        <div class="col-sm-3">
                            <input  name="tgl_pangkas" id="tgl_pangkas" class="form-control" value="{{ isset($model['tgl_pangkas']) or ''}}">
                            
                            @if ($errors->has('tgl_pangkas'))
                                <span class="help-block">
                                    <strong>Tanggal Pangkas Harus Diisi</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('waktu_pangkas') ? ' has-error' : '' }}">
                        <label for="waktu_pangkas" class="col-sm-3 control-label">Waktu Pangkas</label>
                        <div class="col-sm-2">
                            <select id="waktu_pangkas" class="form-control input-sm" name="waktu_pangkas">
                                <option value="" selected disabled>Please select</option>
                                @foreach ($service_hours as $service_hour)
                                    <option value="{{ $service_hour->id }}">{{ $service_hour->hours }}</option>
                                @endforeach
                           </select>

                            @if ($errors->has('waktu_pangkas'))
                                <span class="help-block">
                                    <strong>Waktu Pangkas Harus Diisi</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('id_layanans') ? ' has-error' : '' }}">
                        <label for="id_layanans" class="col-sm-3 control-label">Layanan</label>
                        <div class="col-sm-3" align="left">
                            @foreach ($layanan as $layanan_)
                                <input  type="checkbox" value="{{ $layanan_->id }}" name="id_layanans[]">  {{ $layanan_->nama_layanans }} = RP {{ $layanan_->harga }} <br> 
                            @endforeach


                            @if ($errors->has('id_layanans'))
                                <span class="help-block">
                                    <strong>Layanan Harus Diisi</strong>
                                </span>
                            @endif

                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('lokasi') ? ' has-error' : '' }}">
                        <label for="lokasi" class="col-sm-3 control-label">Lokasi</label>
                        <div class="col-sm-2">
                        <select id="lokasi" class="form-control" name="lokasi" value="{{ isset($model['lokasi']) or ''}}">
                                <option value="" selected disabled>Please select</option>
                                <option>Asrama Satu</option>
                                <option>Asrama Dua</option>
                                <option>Asrama Dantob</option>
                                <option>Asrama Perpus</option>
                                <option>Asrama Rusun Baru</option>
                                <option>Kost Staff IT Del</option>
                                <option>NED Studio HQ</option>
                           </select>
                            <!-- <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ isset($model['lokasi']) or ''}}"> -->
                         @if ($errors->has('lokasi'))
                            <span class="help-block">
                                <strong>Lokasi Harus Diisi</strong>
                            </span>
                        @endif
                        </div>

                       
                    </div>
                        
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-plus"></i> Save
                            </button> 
                            <a class="btn btn-default" href="{{ url('/bookings') }}"><i class="glyphicon glyphicon-chevron-left"></i> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
  <script>
  $(function() {
    $( "#tgl_pangkas" ).datepicker({ dateFormat: 'yy-mm-dd' });
  });
  </script>
@endsection