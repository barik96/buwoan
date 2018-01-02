@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Daftar Buwoan</div>
                    <div class="panel-body">
                        @if ($buwoans->count())
                            <table class="table table-striped">
                                <th>
                                    <td>Nama Tamu</td>
                                    <td>Alamat Tamu</td>
                                    <td>Isi Buwoan</td>
                                    <td>Tombol Aksi</td>
                                </th>

                                @foreach ($buwoans as $buwoan)
                                    <tr>
                                        <td></td>
                                        <td>{{ $buwoan->nama_tamu }}</td>
                                        <td>{{ $buwoan->alamat_tamu }}</td>
                                        <td>{{ $buwoan->isi_buwoan }}</td>
                                        <td>
                                            <a href="{{ route('buwoans.show', ['id' => $buwoan->id]) }}" class="btn btn-sm btn-primary">
                                                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                            </a>
                                            <a href="{{ route('buwoans.edit', ['id' => $buwoan->id]) }}" class="btn btn-sm btn-primary">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </a>
                                            <a href="#" id="delete" class="btn btn-sm btn-danger">
                                                <span class="glyphicon glyphicon-remove danger" aria-hidden="true"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </table>
                        @else
                            <h3>Tidak ada buwoan yang tercatat!</h3>
                        @endif

                        <a href="{{ route('buwoans.create') }}" class="btn btn-sm btn-primary">Tambah data buwoan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@if ($buwoans->count())
@section('footer')
    <script src="https://unpkg.com/sweetalert2"></script>
    <script>
        $(document).on('click', '#delete', function (e) {
            e.preventDefault();
            swal({
                    type: 'warning',
                    title: 'Are you sure to delete?',
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    allowOutsideClick: true,
                }).then(function(confirmVal){
                    if (confirmVal.value) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              },
                            url: "{{ route('buwoans.destroy', ['id' => $buwoan->id]) }}",
                            type: "POST",
                            data: {_method: "DELETE"},  
                            success: function() {
                                location.reload();
                            }
                        });
                    }                                    
                })
        });
    </script>
@endsection
@endif