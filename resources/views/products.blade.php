@extends('layouts.main')
@section('title', __('Products'))
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
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-product" onclick="addProduct()"><i class="fas fa-plus"></i> Add New Product</button>

            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <form >
                        <button class="btn btn-danger" onClick="window.location.reload();">Reset</button>
                         <!-- <input class="btn btn-danger" type="reset" value="Reset"> -->
                    <table class="input" cellspacing="5" cellpadding="5" border="0">
                        <tbody><tr>
                            <td>Minimum Amount:</td>
                            <td><input type="number" id="min1" name="min"></td>
                        </tr>
                        <tr>
                            <td>Maximum Amount:</td>
                            <td><input type="number" id="max1" name="max"></td>
                        </tr>
                    </tbody></table></form>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>{{ __('Product Code') }}</th>
                                <th>{{ __('Product Name') }}</th>
                                <th>{{ __('Category') }}</th>
                                <th>{{ __('Amount') }}</th>
                                <th>{{ __('Purchase Price (Rp)') }}</th>
                                <th>{{ __('Sale Price (Rp)') }}</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(count($products) > 0)
                            @foreach($products as $key => $d)
                            @php
                                $data = [
                                            "no"        => $products->firstItem() + $key,
                                            "pid"       => $d->product_id,
                                            "pcode"     => $d->product_code,
                                            "pname"     => $d->product_name,
                                            "cname"     => $d->category_name,
                                            "cval"      => $d->category_id,
                                            "pamount"   => $d->product_amount,
                                            "pprice"    => $d->purchase_price,
                                            "sprice"    => $d->sale_price
                                        ];
                            @endphp
                            <tr>
                                <td class="text-center">{{ $data['no'] }}</td>
                                <td class="text-center">{{ $data['pcode'] }}</td>
                                <td>{{ $data['pname'] }}</td>
                                <td>{{ $data['cname'] }}</td>
                                <td class="text-center">{{ $data['pamount'] }}</td>
                                <td class="text-center">{{ number_format($data['pprice'], 2, ",", ".") }}</td>
                                <td class="text-center">{{ number_format($data['sprice'], 2, ",", ".") }}</td>
                                <td class="text-center"><button title="Edit Produk" type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#add-product" onclick="editProduct({{ json_encode($data) }})"><i class="fas fa-edit"></i></button> <button title="Lihat Barcode" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#lihat-barcode" onclick="barcode({{ $d->product_code }})"><i class="fas fa-barcode"></i></button> @if(Auth::user()->role == 0)<button title="Hapus Produk" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-product" onclick="deleteProduct({{ json_encode($data) }})"><i class="fas fa-trash"></i></button>@endif</td>
                            </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="8">{{ __('No data.') }}</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div>
        {{ $products->appends(request()->except('page'))->links("pagination::bootstrap-4") }}
        </div>
    </div>
    <div class="modal fade" id="add-product">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modal-title" class="modal-title">{{ __('Add New Product') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" id="save" action="{{ route('products.save') }}" method="post">
                        @csrf
                        <input type="hidden" id="save_id" name="id">
                        <div class="form-group row">
                            <label for="product_code" class="col-sm-4 col-form-label">{{ __('Product Code') }}</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="product_code" name="product_code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product_name" class="col-sm-4 col-form-label">{{ __('Product Name') }}</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="product_name" name="product_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="purchase_price" class="col-sm-4 col-form-label">{{ __('Purchase Price') }} (Rp)</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="purchase_price" name="purchase_price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sale_price" class="col-sm-4 col-form-label">{{ __('Sale Price') }} (Rp)</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="sale_price" name="sale_price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-sm-4 col-form-label">Category</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" style="width: 100%;" id="category" name="category">
                                </select>
                            </div>
                        </div>
                        <div id="barcode_preview_container" class="form-group row">
                            <label class="col-sm-4 col-form-label">Barcode</label>
                            <div class="col-sm-8">
                                <img id="barcode_preview"/>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Cancel') }}</button>
                    <button id="button-save" type="button" class="btn btn-primary" onclick="document.getElementById('save').submit();">{{ __('Tambahkan') }}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="lihat-barcode">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modal-title" class="modal-title">{{ __('Barcode') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <input type="hidden" id="pcode_print">
                        <img id="barcode"/>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Tutup') }}</button>
                    <button type="button" class="btn btn-primary" onclick="printBarcode()">{{ __('Print Barcode') }}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete-product">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modal-title" class="modal-title">{{ __('Delete Product') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form role="form" id="delete" action="{{ route('products.delete') }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" id="delete_id" name="id">
                    </form>
                    <div>
                        <p>Anda yakin ingin menghapus product code <span id="pcode" class="font-weight-bold"></span>?</p>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Batal') }}</button>
                    <button id="button-save" type="button" class="btn btn-danger" onclick="document.getElementById('delete').submit();">{{ __('Ya, hapus') }}</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('custom-js')
    <script src="/plugins/toastr/toastr.min.js"></script>
    <script src="/plugins/select2/js/select2.full.min.js"></script>
    <script>
        $(function () {
            var user_id;
                $('.select2').select2({
                theme: 'bootstrap4'
            });

            $('#product_code').on('change', function() {
                var code = $('#product_code').val();
                if(code != null && code != ""){
                    $("#barcode_preview").attr("src", "/products/barcode/"+code);
                    $('#barcode_preview_container').show();
                }
            });
        });

        $('#sort').on('change', function() {
            $("#sorting").submit();
        });

        function getCategory(val){
            $.ajax({
                url: '/products/categories',
                type: "GET",
                data: {"format": "json"},
                dataType: "json",
                success:function(data) {
                    $('#category').empty();
                    $('#category').append('<option value="">.:: Select Category ::.</option>');
                    $.each(data, function(key, value) {
                        if(value.category_id == val){
                            $('#category').append('<option value="'+ value.category_id +'" selected>'+ value.category_name +'</option>');
                        } else {

                            $('#category').append('<option value="'+ value.category_id +'">'+ value.category_name +'</option>');
                        }
                    });
                }
            });
        }

        function resetForm(){
            $('#save').trigger("reset");
            $('#barcode_preview_container').hide();
        }

        function addProduct(){
            $('#modal-title').text("Add New Product");
            $('#button-save').text("Tambahkan");
            resetForm();
            getCategory();
        }

        function editProduct(data){
            $('#modal-title').text("Edit Product");
            $('#button-save').text("Simpan");
            resetForm();
            $('#save_id').val(data.pid);
            $('#product_code').val(data.pcode);
            $('#product_name').val(data.pname);
            $('#purchase_price').val(data.pprice);
            $('#sale_price').val(data.sprice);
            getCategory(data.cval);
            $('#product_code').change();
        }

        function barcode(code){
            $("#pcode_print").val(code);
            $("#barcode").attr("src", "/products/barcode/"+code);
        }

        function printBarcode(){
            var code    = $("#pcode_print").val();
            var url     = "/products/barcode/"+code+"?print=true";
            window.open(url,'window_print','menubar=0,resizable=0');
        }

        function deleteProduct(data){
            $('#delete_id').val(data.pid);
            $('#pcode').text(data.pcode);
        }
    </script>

<script>

const minEl = document.querySelector('#min1');
const maxEl = document.querySelector('#max1');
$(document).ready( function () {
$.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
    let min1 = parseInt($('#min1').val(), 10);
    let max1 = parseInt($('#max1').val(), 10);
    let age = parseFloat(data[4]) || 0; // use data for the age column

    if ( settings.nTable.id !== 'example2' ) {
            return true;
        }

    if (
        (isNaN(min1) && isNaN(max1)) ||
        (isNaN(min1) && age <= max1) ||
        (min1 <= age && isNaN(max1)) ||
        (min1 <= age && age <= max1)
    ) {
        return true;
    }
    return false;
});





      var  table1 = $("#example2").DataTable({

"responsive": true, "lengthChange": false, "autoWidth": false,
"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
}).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');


var  table = $("#example2").DataTable();



        minEl.addEventListener('input', function () {
    table.draw();
});
maxEl.addEventListener('input', function () {
    table.draw();
});


});
      </script>
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
