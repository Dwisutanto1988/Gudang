@extends('layouts.main')
@section('title', __('Request Item'))
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
            <a  href="{{ route('permintaan.create') }}?no_permintaan={{ hexdec(uniqid()) }}" class="btn btn-sm btn-primary" ><i class="fas fa-plus"> Add Request Item</i></a>
        </div>
        <div class="card-body">
            <table id="table" class="table table-sm table-bordered table-hover table-striped">
            <thead>
                <tr class="text-center">
                    <th>No.</th>
                    <th>No. Permintaan</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($post as $posts )

                <tr>
                    <td>{{ $no }} </td>
                    <td>{{ $posts->no_permintaan }} </td>
                    <td>

                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('permintaan.hapus', $posts->no_permintaan) }}" method="GET">
                        <a href="{{ url('permintaan/create?no_permintaan='.$posts->no_permintaan) }}"
                            class="btn btn-sm btn-primary">EDIT</a>
                     <a target="_blank" href="{{ route('permintaan.show',$posts->no_permintaan) }}"
                                class="btn btn-sm btn-success">PRINT</a>
                        @csrf
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
        {{ $post->links("pagination::bootstrap-4") }}
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
