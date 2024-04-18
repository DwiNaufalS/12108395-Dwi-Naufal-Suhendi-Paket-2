@extends('layouts.employee')
@section('content')

    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2>
                            Product
                        </h2>
                        <br>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $value)
                                    <tr>
                                        <td scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ format_rupiah($value->price) }}</td>
                                        <td>{{ $value->stock }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 

    function format_rupiah($angka)
    {
        $jadi = "Rp " . number_format($angka, 2, ',', '.');
        return $jadi;
    }
    ?>
@endsection
