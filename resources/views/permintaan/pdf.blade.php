<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Lembar Desposisi</title>


    <style type="text/css" media="all">
        table,
        th,
        td {


            font-family: 'Areal', sans-serif;
            font-size: 12px;


            border-collapse: collapse;


            border: 1px solid black;


        }


        .tulis {


            font-family: 'Areal', sans-serif;
            font-size: 12px;


        }


        .noborder,
        .noborder tr,
        .noborder th,
        .noborder td {


            border: none;


        }


        thead {
            display: table-header-group
        }

        tfoot {
            display: table-row-group
        }

        tr {
            page-break-inside: avoid;
        }

        @page {
            margin: 150px 50px 50px
        }
        header {

                    position: fixed;

                    top: -100px;

                    left: 0px;

                    right: 0px;

                    height: 10px;

                    }

    </style>

</head>

<body>
    <header>
    <table class="noborder" cellspacing="0" cellpadding="0" width="100%">

        <tr>
          <td  ><div align="center">STASIUN KARANTINA PERTANIAN SAMARINDA</div></td>
        </tr>
        <tr>
          <td ><div align="center">Jl. PM. Noor No.2,    Kota Samarinda, Kalimantan Timur 75119</div></td>
        </tr>
        <tr>
          <td ><div align="center">FORM PERMINTAAN    BARANG</div></td>
        </tr>
      </table>
    </header>

      <table class="noborder" cellspacing="0" cellpadding="0" width="100%">
        <tr>
          <td colspan="2">NO.PERMINTAAN :{{ $id }}</td>
        </tr>
      </table>
      <table cellspacing="0" cellpadding="0" width="100%">

        <tr>
          <td><div align="center">NO</div></td>
          <td><div align="center">TANGGAL</div></td>
          <td><div align="center">WILKER</div></td>
          <td><div align="center">NAMA BARANG</div></td>
          <td><div align="center">QTY</div></td>
           <td><div align="center">DISETUJUI</div></td>
        </tr>
        @php
        $no = 1;
    @endphp
        @foreach ($data as $posts )
        <tr>
            <td><div align="center">{{ $no }} </div></td>
            <td><div align="center">{{ ubahTgl($posts->tanggal) }} </div></td>
            <td><div align="center">{{ $posts->wilker }} </div></td>
            <td><div align="center">{{ getDataProduct('products','product_name',$posts->product_id) }} </div></td>
            <td><div align="center">{{ $posts->qty }} </div></td>
            <td><div align="center"></div></td>
        </tr>
        @php
        $no++;
    @endphp
    @endforeach
      </table>
<br>
      <table class="noborder" cellspacing="0" cellpadding="0" width="100%">

        <tr>
          <td ><div align="center">PEMOHON</div></td>
          <td width="200"><div align="center">MENYETUJUI</div></td>
          <td><div align="center">PETUGAS </div></td>
        </tr>
        <tr>
          <td height="50" ><div align="center"></div></td>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
        </tr>
        <tr>
          <td><div align="center">{{ getData('users','name', auth()->user()->id) }}</div></td>
          <td><div align="center">.......................</div></td>
          <td><div align="center">{{ $petugas->nama }}</div></td>
        </tr>
      </table>
</body>
</html>
