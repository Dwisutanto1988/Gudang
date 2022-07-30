@extends('layouts.main')
@section('title', __('Stock History'))
@section('custom-css')
    <link rel="stylesheet" href="/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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

            <div class="card-body">

                <div class="table-responsive">

                    <form >
                        <button class="btn btn-warning" onClick="window.location.reload();">Cari</button>  <input class="btn btn-danger" type="reset" value="Reset">
                    <table cellspacing="5" cellpadding="5" border="0">
                        <tbody><tr>
                            <td>Minimum date:</td>
                            <td><input type="text" id="min" name="min"></td>
                        </tr>
                        <tr>
                            <td>Maximum date:</td>
                            <td><input type="text" id="max" name="max"></td>
                        </tr>
                    </tbody></table></form>

                     <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>Type</th>
                                <th>{{ __('Product Code') }}</th>
                                <th>{{ __('Product Name') }}</th>
                                <th>{{ __('Amount') }}</th>
                                <th>{{ __('Shelf Name') }}</th>
                                <th>{{ __('User') }}</th>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Ending Amount') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($history as $key => $d)
                                @php
                                    if($d->type == 1){
                                        $type = "IN";
                                    } else {
                                        $type = "OUT";
                                    }
                                @endphp
                                <tr>
                                    <td class="text-center {{ ($type == 'IN')? 'text-success':'text-danger' }} font-weight-bold">{{ $type }}</td>
                                    <td class="text-center">{{ $d->product_code }}</td>
                                    <td>{{ $d->product_name }}</td>
                                    <td class="text-center">{{ $d->product_amount }}</td>
                                    <td class="text-center">{{ $d->shelf_name }}</td>
                                    <td class="text-center">{{ $d->name }}</td>
                                    <td class="text-center">{{ date('Y-m-d', strtotime($d->datetime)) }}</td>
                                    <td class="text-center">{{ $d->ending_amount }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div>

        </div>
    </div>
</section>
@endsection
@section('custom-js')
    <script src="/plugins/toastr/toastr.min.js"></script>
    <script src="/plugins/select2/js/select2.full.min.js"></script>
    <script>
        $(function () {
            $('.select2').select2({
            theme: 'bootstrap4'
            });
        });

        $('#sort').on('change', function() {
            $("#sorting").submit();
        });
    </script>
@endsection
