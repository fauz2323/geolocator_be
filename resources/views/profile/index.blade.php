@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-xl-6 col-lg-8 col-sm-8">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="text-center">
                        <div class="profile-photo">
                            <img src="images/profile/profile.png" width="100" class="img-fluid rounded-circle"
                                alt="">
                        </div>
                        <h3 class="mt-4 mb-1">{{ $user->name }}</h3>
                        <p class="text-muted">{{ $user->username }}</p>

                    </div>
                    <table class="mt-3 mb-5 mb-5">
                        <tr>
                            <td width="150">Email</td>
                            <td width="30">:</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Daftar</td>
                            <td>:</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                    </table>
                    <div class="row d-flex justify-content-center">
                        <button type="button" class="btn btn-outline-primary btn-rounded mr-3" data-toggle="modal"
                            data-target="#password">
                            Ubah Password
                        </button>
                        <button type="button" class="btn btn-outline-primary btn-rounded" data-toggle="modal"
                            data-target="#profile">
                            Ubah Detail User
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('password-change', $user->id) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password Baru</label>
                            <input type="password" class="form-control" name="password">
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
    <div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('profile-change', $user->id) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" class="form-control" value="{{ $user->email }}" name="email">
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
