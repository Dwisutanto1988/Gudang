<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Inventory Barang') }} | @yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
  @hasSection('custom-css')
    @yield('custom-css')
  @endif
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <span class="nav-link">@yield('title')</span>
      </li>
    </ul>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/" class="brand-link text-center">
      <span class="brand-text font-weight-bold">{{ config('app.name', 'Warehouse') }}</span>
    </a>

    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if(Auth::check())
            @if(Auth::user()->role == 0)
            <li class="nav-item">
                <a class="nav-link {{ (Route::current()->getName() == 'home')? 'active':''}}" href="{{ route('home') }}">
                    <i class="nav-icon fas fa-home"></i>
                    <p class="text">{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (Route::current()->getName() == 'products.wip')? 'active':''}}" href="{{ route('products.wip') }}">
                    <i class="nav-icon fas fa-spinner"></i>
                    <p class="text">{{ __('Work In Progress') }}</p>
                </a>
            </li>
           @endif
            <li class="nav-header">Aplication</li>
            <li class="nav-item">
                <a class="nav-link {{ (Route::current()->getName() == 'permintaan')? 'active':''}}" href="{{ route('permintaan.index') }}">
                    <i class="nav-icon fas fa-boxes"></i>
                    <p class="text">{{ __('Item Request') }}</p>
                </a>
            </li>
            @if(Auth::user()->role == 0)
            <li class="nav-header">Product</li>
            <li class="nav-item">
                <a class="nav-link {{ (Route::current()->getName() == 'products')? 'active':''}}" href="{{ route('products') }}">
                    <i class="nav-icon fas fa-boxes"></i>
                    <p class="text">{{ __('Products List') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (Route::current()->getName() == 'products.categories')? 'active':''}}" href="{{ route('products.categories') }}">
                    <i class="nav-icon fas fa-project-diagram"></i>
                    <p class="text">{{ __('Categories') }}</p>
                </a>
            </li>
            @endif
            @if(Auth::user()->role == 0)
            <li class="nav-item">
                <a class="nav-link {{ (Route::current()->getName() == 'products.shelf')? 'active':''}}" href="{{ route('products.shelf') }}">
                    <i class="nav-icon fas fa-warehouse"></i>
                    <p class="text">{{ __('Shelf') }}</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ (Route::current()->getName() == 'tujuan.index')? 'active':''}}" href="{{ route('tujuan.index') }}">
                    <i class="nav-icon fas fa-warehouse"></i>
                    <p class="text">{{ __('Tujuan') }}</p>
                </a>
            </li>
            @endif
            <li class="nav-header">Settings</li>
            @if(Auth::user()->role == 0)
            <li class="nav-item">
              <a class="nav-link {{ (Route::current()->getName() == 'users')? 'active':''}}" href="{{ route('users') }}">
                  <i class="nav-icon fas fa-users"></i>
                  <p class="text">{{ __('Users') }}</p>
              </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ (Route::current()->getName() == 'petugas')? 'active':''}}" href="{{ route('petugas.index') }}">
                    <i class="nav-icon fas fa-user-circle"></i>
                    <p class="text">{{ __('Petugas') }}</p>
                </a>
              </li>

            @endif
            <li class="nav-item">
              <a class="nav-link {{ (Route::current()->getName() == 'myaccount')? 'active':''}}" href="{{ route('myaccount') }}">
                  <i class="nav-icon fas fa-user-cog"></i>
                  <p class="text">{{ __('My Account') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <form id="logout" action="{{ route('logout') }}" method="post">@csrf</form>
              <a class="nav-link" href="javascript:;" onclick="document.getElementById('logout').submit();">
                  <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                  <p class="text">{{ __('Logout') }} ({{ Auth::user()->username }})</p>
              </a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">
                    <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                    <p class="text">{{ __('Login') }}</p>
                </a>
            </li>
            @endif
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">
    @yield('content')
  </div>

  <footer class="main-footer">
    <b>Version</b> {{ config('app.version') }}
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="/plugins/jquery/jquery.min.js"></script>
<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/js/adminlte.js"></script>
 <!-- DataTables  & Plugins -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/plugins/jszip/jszip.min.js"></script>
<script src="/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="/plugins/select2/js/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
 <script>

var minDate, maxDate;

 // Custom filtering function which will search data in column four between two values
 $.fn.dataTable.ext.search.push(
     function( settings, data, dataIndex ) {
         var min = minDate.val();
         var max = maxDate.val();
         var date = new Date( data[7] );

         if (
             ( min === null && max === null ) ||
             ( min === null && date <= max ) ||
             ( min <= date   && max === null ) ||
             ( min <= date   && date <= max )
         ) {
             return true;
         }
         return false;
     }
 );
    $(function () {

          // Create date inputs
    minDate = new DateTime($('#min'), {
        format: 'MMMM Do YYYY'
    });
    maxDate = new DateTime($('#max'), {
        format: 'MMMM Do YYYY'
    });

      var table = $("#example1").DataTable({

        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


      $('#min, #max').on('change', function () {
        table.draw();
   });
    });
  </script>



<script>

$.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
    var min1 = parseInt($('#min1').val(), 10);
    var max1 = parseInt($('#max1').val(), 10);
    var age = parseFloat(data[4]) || 0; // use data for the age column

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
        $(function () {

            var table = $("#example2").DataTable({

            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');


          $('#min1, #max1').keyup(function () {
        table2.draw();
    });
        });
      </script>



<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })


  })



</script>



@hasSection('custom-js')
    @yield('custom-js')
@endif
</body>
</html>
