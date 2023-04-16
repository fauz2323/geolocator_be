@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Data Fasilitas Kesehatan</div>

                    <div class="card-body">
                        <table>
                            <tr>
                                <td style="width: 240px">Nama Fasilitas Kesehatan</td>
                                <td style="width: 40px">:</td>
                                <td>{{ $data->nama_faskes ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Kode Fasilitas Kesehatan</td>
                                <td>:</td>
                                <td>{{ $data->kode_faskes ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Kategory</td>
                                <td>:</td>
                                <td>{{ $data->kategori->nama_kategory ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>{{ $data->alamat ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Telpon</td>
                                <td>:</td>
                                <td>{{ $data->telpon ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Latitude</td>
                                <td>:</td>
                                <td>{{ $data->latitude ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Longitude</td>
                                <td>:</td>
                                <td>{{ $data->longitude ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td>{{ $data->verifikasi ?? '-' }}</td>
                            </tr>
                        </table>
                        @if ($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
                        @if ($data)
                            <img src="{{ asset('storage/' . $data->gambar) }}" class="img-fluid" alt="Responsive image">
                        @endif
                        @if (!$data)
                            <div>
                                <button type="button" class="btn btn-primary mt-3 col-12" data-toggle="modal"
                                    data-target="#exampleModal">
                                    Add Fasilitas Kesehatan
                                </button>
                            </div>
                        @elseif ($data)
                            <div>
                                <button type="button" class="btn btn-primary mt-3 col-12" data-toggle="modal"
                                    data-target="#edit">
                                    Edit Fasilitas Kesehatan
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Data Fasilitas Kesehatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('add-user-faskes') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kategori Fasilitas Kesehatan</label>
                            <select name="kode_kategori" class="form-control" id="exampleFormControlSelect1">
                                <option disabled>Pilih Kategori</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategory }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Faskes</label>
                            <input type="text" class="form-control" name="nama_faskes">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kode Faskes</label>
                            <input type="text" class="form-control" name="kode_faskes">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Telepon</label>
                            <input type="text" class="form-control" name="telpon">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Latitude</label>
                            <input type="text" class="form-control" name="latitude">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Longitude</label>
                            <input type="text" class="form-control" name="longitude">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Gambar</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gambar" required>
                                <label class="custom-file-label" for="validatedCustomFile">Pilih file...</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Data Fasilitas Kesehatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('edit-user-faskes') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kategori Fasilitas Kesehatan</label>
                            <select name="kode_kategori" class="form-control" id="exampleFormControlSelect1">
                                <option disabled>Pilih Kategori</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategory }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Faskes</label>
                            <input type="text" class="form-control" value="{{ $data->nama_faskes ?? '-' }}"
                                name="nama_faskes">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kode Faskes</label>
                            <input type="text" class="form-control" value="{{ $data->kode_faskes ?? '-' }}"
                                name="kode_faskes">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3">{{ $data->alamat ?? '-' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Telepon</label>
                            <input type="text" class="form-control" value="{{ $data->telpon ?? '-' }}"
                                name="telpon">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Latitude</label>
                            <input type="text" class="form-control" value="{{ $data->latitude ?? '-' }}"
                                name="latitude">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Longitude</label>
                            <input type="text" class="form-control" value="{{ $data->longitude ?? '-' }}"
                                name="longitude">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Gambar</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gambar">
                                <label class="custom-file-label" for="validatedCustomFile">Pilih file...</label>
                            </div>
                            <p class="text-danger">*Jika tidak ada perubahan pada gambar mohon kosongi</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
