@extends('layouts.layouts-petugas.master')

@section('content')
    <div class="wrapper">
        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>General Form</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Identitas Customers</h3>
                                </div>
                                <form action="{{ route('customers') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Name</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="name" placeholder="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Address</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="address" placeholder="address">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">No Hp</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" name="no_hp" placeholder="No Hp">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
        </div>
    </div>
@endsection
