@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Form Isi Buwoan</div>

                <div class="panel-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
             
                <form method="POST" action="/buwoans" accept-charset="UTF-8" class="form-horizontal">
                {{ csrf_field() }}

                             
             
                    <!-- Nama -->
                    <div class="form-group">
                        <label for="nama_tamu" class="col-lg-2 control-label">Nama Tamu:</label>
                        <div class="col-lg-10">
                            <input class="form-control" placeholder="Nama" required="true" name="nama_tamu" type="text" id="nama_tamu">
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="form-group">
                        <label for="alamat_tamu" class="col-lg-2 control-label">Alamat:</label>
                        <div class="col-lg-10">
                            <input class="form-control" placeholder="Alamat" required="true" name="alamat_tamu" type="text" id="alamat_tamu">
                        </div>
                    </div>

                    <!-- Isi Buwoan -->
                    <div class="form-group">
                        <label for="isi_buwoan" class="col-lg-2 control-label">Isi Buwoan:</label>
                        <div class="col-lg-10">
                            <input class="form-control" placeholder="Isi Buwoan" required="true" name="isi_buwoan" type="text" id="isi_buwoan">
                        </div>
                    </div>
             
                    <!-- Submit Button -->
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <input class="btn btn-lg btn-info pull-right" type="submit" value="Submit">
                        </div>
                    </div>
             
             
                </form>

            </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
