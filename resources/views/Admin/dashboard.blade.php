@extends('layouts.layouts-admin.master')

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Selamat datang, <b>{{ Auth::user()->name }}</b></h1>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection