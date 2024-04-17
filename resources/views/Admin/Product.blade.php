@extends('layouts.layouts-admin.master')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Product</h1>
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
                                            Tambah Produk
                                        </button>
                                        <tr>
                                            <th>#</th>
                                            <th></th>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Product as $Products)
                                            <tr>
                                                <td> {{ $Products->id }}</td>
                                                <td><img src="{{ asset('/storage/cover/' . $Products->img) }}"
                                                        alt=""></td>
                                                <td> {{ $Products->name }}</td>
                                                <td>{{ $Products->price }}</td>
                                                <td>{{ $Products->stock }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#modalEditProduk-{{ $Products->id }}">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#modalUpdateStok-{{ $Products->id }}">
                                                        <i class="fas fa-update"></i> Update Stok
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#modalHapusProduk-{{ $Products->id }}">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </td>
                                            </tr>

                                            {{-- edit --}}
                                            <div class="modal fade" id="modalEditProduk-{{ $Products->id }}" tabindex="-1"
                                                aria-labelledby="modalEditProduk" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalEditProduk">Edit</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('proses_EditProduct', $Products->id) }}"
                                                                method="POST" enctype="multipart/form-data"
                                                                id="formeEditProduk">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <label for="NamaProduk">Nama Produk</label>
                                                                    <input type="text" class="form-control"
                                                                        id="namaProduk" name="name"
                                                                        value="{{ $Products->name }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Harga">Harga</label>
                                                                    <input type="number" class="form-control"
                                                                        id="harga" name="price"
                                                                        value="{{ $Products->price }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="GambarProduk">Gambar Produk</label>
                                                                    <input type="file" class="form-control"
                                                                        id="img" name="img"
                                                                        value="{{ $Products->img }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Stok">Stok</label>
                                                                    <input type="number" class="form-control"
                                                                        id="stock" name="stock"
                                                                        value="{{ $Products->stock }}" disabled>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- update stok --}}
                                            <div class="modal fade" id="modalUpdateStok-{{ $Products->id }}" tabindex="-1"
                                                aria-labelledby="modalUpdateStok" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalUpdateStok">Edit</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('proses_UpdateStok', $Products->id) }}"
                                                                method="POST" enctype="multipart/form-data"
                                                                id="formUpdateStok">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <label for="NamaProduk">Nama Produk</label>
                                                                    <input type="text" class="form-control"
                                                                        id="namaProduk" name="name"
                                                                        value="{{ $Products->name }}" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Stok">Stok</label>
                                                                    <input type="number" class="form-control"
                                                                        id="stok" name="stock"
                                                                        value="{{ $Products->stock }}">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- hapus --}}
                                            <div class="modal fade" id="modalHapusProduk-{{ $Products->id }}" tabindex="-1"
                                                aria-labelledby="modalHapusProduk" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalHapusProduk">Hapus Produk
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                                <form
                                                                    action="{{ route('proses_DeleteProduct', $Products->id) }}"
                                                                    method="POST" id="formTambahProduk">
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

                        <!-- Modal Tambah Produk -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form tambah produk -->
                                        <form action="{{ route('proses_TambahProduct') }}" method="POST"
                                            enctype="multipart/form-data" id="formTambahProduk">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Nama Produk</label>
                                                <input type="text" class="form-control" id="nama_produk"
                                                    name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="price">Harga</label>
                                                <input type="text" class="form-control" id="harga"
                                                    name="price">
                                            </div>
                                            <div class="form-group">
                                                <label for="img">Gambar Produk</label>
                                                <input type="file" class="form-control" id="gambar_produk"
                                                    name="img">
                                            </div>
                                            <div class="form-group">
                                                <label for="stok">Stok</label>
                                                <input type="number" class="form-control" id="stok"
                                                    name="stock">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
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