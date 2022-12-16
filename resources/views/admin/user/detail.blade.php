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
                            <td>Join Date</td>
                            <td>:</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                    </table>
                    <div class="row d-flex justify-content-center">
                        <button type="button" class="btn btn-outline-primary btn-rounded mr-3" data-toggle="modal"
                            data-target="#password">
                            Change Password
                        </button>
                        <button type="button" class="btn btn-outline-primary btn-rounded" data-toggle="modal"
                            data-target="#profile">
                            Change Profile
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
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('password-user', $user->id) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">New Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Change Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('profile-user', $user->id) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">name</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" class="form-control" value="{{ $user->email }}" name="email">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
