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
                                        <a href="form_product"> <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                                            data-target="#exampleModal">
                                            <i class="fas fa-plus"></i>
                                            Tambah Data Pembelian
                                        </button></a>
                                        <tr>
                                            <th>Customers</th>
                                            <th>Tanggal Pembelian</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Customer as $Customers)
                                            <tr>
                                               <td>{{ $Customers->name }}</td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                            </tr>
                                         @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </section>
    </div>
@endsection