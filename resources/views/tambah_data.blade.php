@extends('layouts.master')
@section('title')
@section('content')

<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('cr.simpan') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col md 6">
                            <div class="form-group">
                                <label>Kode Barang</label>
                                <input type="text" name="kode_barang" class="form-control">
                            </div>
                        </div>
                        <div class="col md 6">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-left">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('page-scripts')

@endpush
