@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Detail Buwoan</div>
                    <div class="panel-body">
                        <dl class="dl-horizontal">
                          <dt>Nama tamu</dt>
                          <dd>{{ $buwoan->nama_tamu }}</dd>
                          <dt>Alamat tamu</dt>
                          <dd>{{ $buwoan->alamat_tamu }}</dd>
                          <dt>Isi Buwoan</dt>
                          <dd>{{ $buwoan->isi_buwoan }}</dd>
                          <dt>Waktu Dibuat</dt>
                          <dd>{{ $buwoan->created_at }}</dd>
                          <dt>Waktu Diperbaruhi</dt>
                          <dd>{{ $buwoan->updated_at }}</dd>
                        </dl>

                        <a href="{{ route('buwoans.index') }}" class="btn btn-sm btn-primary">Daftar buwoan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection