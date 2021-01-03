@extends('layouts.master')
@section('title')
@section('content')

<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <a href="{{ route('cr.tambah')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
            <hr>
            @if (session('message'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span></span>
                    </button>
                    {{ session('message') }}
                </div>
            </div>
            @endif
            <table class="table table-bordered table-stripped">
                <tr>
                    <th>No.</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Action</th>
                </tr>
                @foreach ($data_barang as $no => $data)
                <tr>
                    <td>{{ $data_barang->firstItem()+$no }}</td>
                    <td>{{ $data->kode_barang }}</td>
                    <td>{{ $data->nama_barang }}</td>
                    <td>
                        <button type="button" href="" class="btn btn-primary btn-sm mr-2"><i class="fas fa-edit"></i> Edit</button>
                        <button type="button" data-id="{{ $data->id }}" href="" class="btn btn-danger btn-sm swal-confirm"><i class="fas fa-trash"></i> Delete
                            <form action="{{ route('cr.delete', $data->id ) }}" id="delete{{ $data->id }}" method="POST">
                            @csrf
                            @method('delete')
                            </form>
                        </button>
                    </td>
                </tr>
                @endforeach
            </table>
            {{ $data_barang->links()}}
        </div>
    </div>
</div>

@endsection

@push('page-scripts')
<script src="{{ asset('assets/sweetalert/dist/sweetalert.min.js') }}"></script>

@endpush

@push('after-scripts')
    <script>
        $(".swal-confirm").click(function(e) {
            id = e.target.dataset.id
            swal({
                title: 'Apakah Anda ingin Menghapus Data ini?',
                text: 'Anda tidak bisa mengembalikan data yang telah terhapus',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal('Data berhasil dihapus!', {
                        icon: 'success'
                    });
                    $(`#delete${id}`).submit();
                } else {

                }
            });
        });
    </script>
@endpush
