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
          <h5>  Request Item </h5>
        </div>
        <div class="card-body">
            @if (empty ($post))


                        @include ('permintaan.form')

                    @else

                    {!! Form::model($post, ['method' => 'PATCH','class'=>'form-horizontal','files'=>'true','route' => ['permintaan.update', $post->id]]) !!}
                        @csrf
                        @include ('permintaan.form')
                    {!! Form::close() !!}

                    @endif
        </div>

</section>

@endsection
