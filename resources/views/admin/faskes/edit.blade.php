@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Faskes</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('edit-faskes', $data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kategory Fasilitas Kesehatan</label>
                            <select name="kode_kategori" class="form-control" id="exampleFormControlSelect1">
                                <option disabled>Pilih Kategory</option>
                                @foreach ($kategori as $item)
                                    <option selected='{{ $item->id == $data->kode_kategori ? 'true' : 'false' }}'
                                        value="{{ $item->id }}">{{ $item->nama_kategory }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Faskes</label>
                            <input type="text" class="form-control" value="{{ $data->nama_faskes }}" name="nama_faskes">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kode Faskes</label>
                            <input type="text" class="form-control" value="{{ $data->kode_faskes }}" name="kode_faskes">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3">{{ $data->alamat }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Telepon</label>
                            <input type="text" class="form-control" value="{{ $data->telpon }}" name="telpon">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Latitude</label>
                            <input type="text" class="form-control" value="{{ $data->latitude }}" name="latitude">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Longitude</label>
                            <input type="text" class="form-control" value="{{ $data->longitude }}" name="longitude">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gambar">
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                            </div>
                            <p class="text-danger">*Jika tidak ada perubahan pada gambar mohon kosongi</p>
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <img src="{{ asset('uploads/' . $data->gambar) }}" class="img-fluid" alt="Responsive image">
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
