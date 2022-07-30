@extends('layouts.main')
@section('title', __('Shelf'))
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-shelf" onclick="addShelf()"><i class="fas fa-plus"></i> Add New Shelf</button>
        </div>
        <div class="card-body">
            <table id="table" class="table table-sm table-bordered table-hover table-striped">
            <thead>
                <tr class="text-center">
                    <th>No.</th>
                    <th>{{ __('tujuan') }}</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($tujuans as $tujuan )

                <tr>
                    <td>{{ $no }} </td>
                    <td>{{ $tujuan->tujuan }} </td>
                    <td>

                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('tujuan.destroy', $tujuan->id) }}" method="POST">
                        <a href="{{ route('tujuan.edit', $tujuan->id) }}"
                            class="btn btn-sm btn-primary">EDIT</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                    </form>



                    </td>

                </tr>
                @php
                    $no++;
                @endphp
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
        <div>
        {{ $tujuans->links("pagination::bootstrap-4") }}
        </div>
    </div>
    <div class="modal fade" id="add-shelf">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modal-title" class="modal-title">{{ __('Add New Tujuan') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" id="update" action="{{ route('tujuan.store') }}" method="post">
                        @csrf

                        <div class="form-group row">
                            <label for="shelf_name" class="col-sm-4 col-form-label">{{ __('Name') }}</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="shelf_name" name="tujuan" required>
                            </div>
                        </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <button id="button-save" type="submit" class="btn btn-primary">{{ __('Add') }}</button>
                </div>
            </form>
            </div>
        </div>
    </div>





</section>
@endsection
@section('custom-js')

    <script src="/plugins/toastr/toastr.min.js"></script>
    @if(Session::has('success'))
        <script>toastr.success('{!! Session::get("success") !!}');</script>
    @endif
    @if(Session::has('error'))
        <script>toastr.error('{!! Session::get("error") !!}');</script>
    @endif
    @if(!empty($errors->all()))
        <script>toastr.error('{!! implode("", $errors->all("<li>:message</li>")) !!}');</script>
    @endif
@endsection
