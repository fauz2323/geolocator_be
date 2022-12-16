@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-xl-6 col-lg-8 col-sm-8">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <form action="{{ route('edit-kategory', $data->id) }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kode Kategori</label>
                                <input type="text" class="form-control" value="{{ $data->kode_kategori }}"
                                    name="kode_kategori">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Kategori</label>
                                <input type="text" class="form-control" value="{{ $data->nama_kategory }}"
                                    name="nama_kategory">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
