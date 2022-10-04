@extends('layouts.main')
@section('title', __('Tujuan'))
@section('custom-css')
    <link rel="stylesheet" href="/plugins/toastr/toastr.min.css">
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
        </div>
        </div>
    </div>
    <section class="content">
    <div class="container-fluid">
        <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <table id="table" class="table table-sm table-bordered table-hover table-striped">
                <form action="{{ route('petugas.update',$petugas->id) }}" method="POST">
                    @csrf
                    @method('PUT')

            <td> Tujuan </td> <td> <input type="text" name = "nama" value="{{ $petugas->nama }}" required></td>
            <td>      <button type="submit" class="btn btn-md btn-primary">Update</button>
                <a href="{{ route('petugas.index') }}" class="btn btn-md btn-secondary">back</a></td>

            </table>
        </form>
        </div>

</section>

@endsection
