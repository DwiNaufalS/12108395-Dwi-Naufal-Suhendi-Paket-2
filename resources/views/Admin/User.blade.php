@extends('layouts.layouts-admin.master')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Account Operator</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                            data-target="#exampleModal">
                                            <i class="fas fa-plus"></i>
                                            Tambah User
                                        </button>
                                        <tr>
                                            <th>#</th>
                                            <th>Email</th>
                                            <th>Nama</th>
                                            <th>Role</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $users)
                                            <tr>
                                                <td> {{ $users->id }}</td>
                                                <td>{{ $users->email }}</td>
                                                <td>{{ $users->name }}</td>
                                                <td>{{ $users->role }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#modalEditUser-{{ $users->id }}">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#modalHapusUser-{{ $users->id }}">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </td>
                                            </tr>

                                            {{-- edit user --}}
                                            <div class="modal fade" id="modalEditUser-{{ $users->id }}" tabindex="-1"
                                                aria-labelledby="modalEditUser" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalEditUser">Edit User</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('proses_EditUser', $users->id) }}"
                                                                method="POST" enctype="multipart/form-data"
                                                                id="formEditUser">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Email</label>
                                                                    <input type="email" name="email"
                                                                        class="form-control" id="exampleInputNamei1"
                                                                        value="{{ $users->email }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Nama</label>
                                                                    <input type="text" name="name"
                                                                        class="form-control" id="exampleInputUsername1"
                                                                        value="{{ $users->name }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="role">Role</label>
                                                                    <select class="form-control" id="role"
                                                                        name="role">
                                                                        <option value="admin"
                                                                            {{ $users->role == 'admin' ? 'selected' : '' }}>
                                                                            Admin</option>
                                                                        <option value="employee"
                                                                            {{ $users->role == 'employee' ? 'selected' : '' }}>
                                                                            Employee</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputPassword1">Password</label>
                                                                    <input   type="password" name="password"
                                                                        class="form-control" id="exampleInputPassword1"
                                                                        placeholder="">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- hapus --}}
                                            <div class="modal fade" id="modalHapusUser-{{ $users->id }}" tabindex="-1"
                                                aria-labelledby="modalHapusUser" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalHapusUser">Hapus User</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('proses_DeleteUser', $users->id) }}"
                                                                method="POST" id="formDeleteUser">
                                                                @csrf
                                                                @method('DELETE')
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Hapus</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form tambah user -->
                                        <form action="{{ route('proses_CreateUser') }}" method="POST"
                                            enctype="multipart/form-data" id="formTambahProduk">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="email" name="email" class="form-control"
                                                    id="exampleInputNamei1" placeholder="email">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama</label>
                                                <input type="text" name="name" class="form-control"
                                                    id="exampleInputUsername1" placeholder="nama">
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Role</label>
                                                <select class="form-control" id="role" name="role">
                                                    <option value="admin">Admin</option>
                                                    <option value="employee">Employee</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" name="password" class="form-control"
                                                    id="exampleInputPassword1" placeholder="Password">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>

    </div>
@endsection