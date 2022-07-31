<?php

if (!function_exists('status')) {
    function status($status)
    {
        switch ($status) {
            case 1:
                return 'Aktif';
                break;
            case 2:
                return 'Pasif';
                break;
            default:
                return 'Belum Ada Data';
                break;
        }
    }
}

if (!function_exists('jskv')) {
    function jsks($idreg)
    {
        $data = DB::table('basic_samples')
            ->where('id_regs', $idreg)
            ->sum('jumlah');
        //$jumlah = $data->jumlah;
        return isset($data) ? $data : '';
    }
}

if (!function_exists('jskv')) {
    function jskv($idreg)
    {
        $data = DB::table('pemeriksaankvs')
            ->where('id_regs', $idreg)
            ->sum('jumlah');
        // $jumlah = $data->jumlah;
        return isset($data) ? $data : '';
    }
}

if (!function_exists('data_uji')) {
    function data_uji($data_uji)
    {
        switch ($data_uji) {
            case 6:
                return 'Identifikasi Spesies';
                break;
            case 7:
                return 'Cemaran Mikroba';
                break;
            case 8:
                return 'Fisio Kimia';
                break;
            default:
                return 'Belum Ada Data';
                break;
        }
    }
}

if (!function_exists('getBulan')) {
    function getBulan($bln)
    {
        switch ($bln) {
            case 1:
                return 'Januari';
                break;
            case 2:
                return 'Februari';
                break;
            case 3:
                return 'Maret';
                break;
            case 4:
                return 'April';
                break;
            case 5:
                return 'Mei';
                break;
            case 6:
                return 'Juni';
                break;
            case 7:
                return 'Juli';
                break;
            case 8:
                return 'Agustus';
                break;
            case 9:
                return 'September';
                break;
            case 10:
                return 'Oktober';
                break;
            case 11:
                return 'November';
                break;
            case 12:
                return 'Desember';
                break;
        }
    }
}

if (!function_exists('getBln')) {
    function getBln($tgl)
    {
        if (!empty($tgl)):
            $tanggal = substr($tgl, 8, 2);
            $bulan = getBulan(substr($tgl, 5, 2));
            $tahun = substr($tgl, 0, 4);
            return $bulan;
        else:
            return '-';
        endif;
    }
}

if (!function_exists('getBt')) {
    function getBt($tgl)
    {
        if (!empty($tgl)):
            $tanggal = substr($tgl, 8, 2);
            $bulan = getBulan(substr($tgl, 5, 2));
            $tahun = substr($tgl, 0, 4);
            return $bulan . ' ' . $tahun;
        else:
            return '-';
        endif;
    }
}

if (!function_exists('getTahun')) {
    function getTahun($tgl)
    {
        if (!empty($tgl)):
            $tanggal = substr($tgl, 8, 2);
            $bulan = getBulan(substr($tgl, 5, 2));
            $tahun = substr($tgl, 0, 4);
            return $tahun;
        else:
            return '-';
        endif;
    }
}

if (!function_exists('getTgl')) {
    function getTgl($tgl)
    {
        if (!empty($tgl)):
            $tanggal = substr($tgl, 8, 2);
            $bulan = getBulan(substr($tgl, 5, 2));
            $tahun = substr($tgl, 0, 4);
            return $tanggal;
        else:
            return '-';
        endif;
    }
}

if (!function_exists('getHari')) {
    function getHari($tgl)
    {
        $hari = date('D', strtotime($tgl));

        switch ($hari) {
            case 'Sun':
                $hari_ini = 'Minggu';
                break;

            case 'Mon':
                $hari_ini = 'Senin';
                break;

            case 'Tue':
                $hari_ini = 'Selasa';
                break;

            case 'Wed':
                $hari_ini = 'Rabu';
                break;

            case 'Thu':
                $hari_ini = 'Kamis';
                break;

            case 'Fri':
                $hari_ini = 'Jumat';
                break;

            case 'Sat':
                $hari_ini = 'Sabtu';
                break;

            default:
                $hari_ini = 'Tidak di ketahui';
                break;
        }

        return $hari_ini;
    }
}

if (!function_exists('tgl_indo')) {
    function tgl_indo($tgl)
    {
        if (!empty($tgl)):
            $tanggal = substr($tgl, 8, 2);
            $bulan = getBulan(substr($tgl, 5, 2));
            $tahun = substr($tgl, 0, 4);
            return $tanggal . ' ' . $bulan . ' ' . $tahun;
        else:
            return '-';
        endif;
    }

    if (!function_exists('tgl_singkat')) {
        function tgl_singkat($tgl)
        {
            if (!empty($tgl)):
                $tanggal = substr($tgl, 8, 2);
                $bulan = getBulan(substr($tgl, 5, 2));
                $tahun = substr($tgl, 0, 4);
                return $tanggal .
                    '-' .
                    substr(stripslashes($bulan), 0, 3) .
                    '-' .
                    $tahun;
            else:
                return '-';
            endif;
        }
    }
}

if (!function_exists('ubahTgl')) {
    function ubahTgl($tanggal)
    {
        if (!empty($tanggal)):
            $pisah = explode('-', $tanggal);
            $larik = [$pisah[2], $pisah[1], $pisah[0]];
            $satukan = implode('-', $larik);
            return $satukan;
        else:
            return '-';
        endif;
    }
}

if (!function_exists('ubahTgl2')) {
    function ubahTgl2($tanggal)
    {
        if (!empty($tanggal)):
            $pisah = explode('/', $tanggal);
            $larik = [$pisah[2], $pisah[1], $pisah[0]];
            $satukan = implode('-', $larik);
            return $satukan;
        else:
            return '-';
        endif;
    }
}

if (!function_exists('getData')) {
    function getData($table, $name, $id)
    {
        $rose = DB::table($table)
            ->where('id', $id)
            ->first();

        return isset($rose->$name) ? $rose->$name : '-';
    }
}

if (!function_exists('getAll')) {
    function getAll($table, $filed, $name, $id)
    {
        $rose = DB::table($table)
            ->where($filed, $id)
            ->first();

        return isset($rose->$name) ? $rose->$name : '';
    }
}

if (!function_exists('get_sampel')) {
    function get_sampel($idreg, $id_basicsample)
    {
        $post = DB::table('pemeriksaankvs')
            ->where('id_regs', $idreg)
            ->where('id', $id_basicsample)
            ->first();
        return isset($post->jenissample) ? $post->jenissample : '';
    }
}

if (!function_exists('get_spesimen')) {
    function get_spesimen($idsampel)
    {
        $post = DB::table('spesimens')
            ->where('id', $idsampel)
            ->first();
        return isset($post->name) ? $post->name : '';
    }
}

if (!function_exists('total_prks')) {
    function total_prks($idreg, $idjnsprk)
    {
        $total = DB::table('lampirans')
            ->where('id_reg', $idreg)
            ->where('id_jnsprk', $idjnsprk)
            ->where('value', 1)
            ->count();
        return isset($total) ? $total : '';
    }
}

if (!function_exists('nama_jnsprk')) {
    function nama_jnsprk($id)
    {
        $data = DB::table('jnsprks')
            ->where('id', $id)
            ->first();
        return isset($data->name) ? $data->name : '';
    }
}

if (!function_exists('rev_ks')) {
    function rev_ks($id_reg)
    {
        $data = DB::table('reviews')
            ->where('id_regs', $id_reg)
            ->get();
        return isset($data) ? $data : '';
    }
}

if (!function_exists('jabatan')) {
    function jabatan($jb)
    {
        switch ($jb) {
            case '1':
                return 'KASI P2PH';
                break;
            case '2':
                return 'Kasi P2KHP';
                break;
            case '3':
                return 'Kasubbag TU';
                break;
            case '4':
                return 'Manager Teknis';
                break;
            case '5':
                return 'Kepala UPTD';
                break;
            default:
                return '-';
                break;
        }
    }
}

if (!function_exists('total_invks')) {
    function total_invks($idreg)
    {
        $rev = DB::table('reviews')
            ->where('id_regs', $idreg)
            ->first();
        $id_metodeuji = $rev->id_jenis_uji;
        $basic_sample = DB::table('basic_samples')
            ->where('id_regs', $idreg)
            ->first();
        $jumlah = $basic_sample->jumlah;
        $jenis = DB::table('jnsprks')
            ->where('id', $id_metodeuji)
            ->first();
        $harga = $jenis->price;
        $sub_total = $jumlah * $harga;

        return isset($sub_total) ? $sub_total : '';
    }
}

if (!function_exists('harga')) {
    function harga($id)
    {
        $rev = DB::table('jnsprks')
            ->where('id', $id)
            ->first();
        $chek = DB::table('jnsprks')
            ->where('id', $id)
            ->count();
        if ($chek >= 1) {
            $total = $rev->price;
        } else {
            $total = 0;
        }
        return isset($total) ? $total : 0;
    }
}

if (!function_exists('total_invkv')) {
    function total_invkv($idreg)
    {
        $rev = DB::table('pemeriksaankvs')
            ->where('id_regs', $idreg)
            ->get();
        $chek = DB::table('pemeriksaankvs')
            ->where('id_regs', $idreg)
            ->count();
        if ($chek >= 1) {
            foreach ($rev as $i => $tablekv) {
                //$ab=$tablekv->invoiced;
                // $ba =harga($tablekv->jenis_uji);
                $c[] = $tablekv->invoiced * harga($tablekv->jenis_uji);
            }
            $total = array_sum($c);
        } else {
            $total = 0;
        }
        // $rev=DB::table('Pemeriksaankvs')->where('id_regs', $idreg)->get();
        // $id_regs = $id_reg;
        // $id_metodeuji=$rev->jenis_uji;
        // $jumlah=$rev->jumlah;
        /*
      foreach ($rev as $i =>$data)
      {
          $id_metodeuji = $data->jenis_uji;
          $jumlah = $data->jumlah;
          $jenis = DB::table('jnsprks')->where('id', $id_metodeuji)->first();
          $harga = $jenis->price;
          $total[] = $jumlah * $harga;
      }
      */

        // $sub_total = number_format(array_sum($total)??null);

        return isset($total) ? $total : 0;
    }
}

if (!function_exists('analis_peta_aktif')) {
    function analis_peta_aktif($idjnsprk, $df, $dt, $id_kec)
    {
        $reg = DB::table('regs')
            ->select('regs.id', 'customers.district_id')
            ->join('customers', 'customers.id', '=', 'regs.id_customer')
            ->where('district_id', $id_kec)
            ->wherebetween('tgl', [$df, $dt])
            ->get();
        $total = 0;

        foreach ($reg as $i => $data) {
            $total_positif = DB::table('lampirans')
                ->where('id_jnsprk', $idjnsprk)
                ->where('hasil_uji', 'like', '%positif%')
                ->where('id_reg', $data->id)
                ->count();
            $total = $total_positif + $total;
        }

        return isset($total) ? $total : '';
    }
}

if (!function_exists('analis_peta_pasif')) {
    function analis_peta_pasif($idjnsprk, $df, $dt, $id_kec)
    {
        $menu = DB::table('jnsprks')
            ->where('id', $idjnsprk)
            ->first();
        $id_menu = $menu->peta;

        $reg = DB::table('regs')
            ->wherebetween('tgl', [$df, $dt])
            ->pluck('id');

        switch ($id_menu) {
            case '1':
                $lamp = DB::table('lampirans')
                    ->wherein('id_reg', $reg)
                    ->where('id_jnsprk', $idjnsprk)
                    ->where('hasil_uji', 'like', '%positif%')
                    ->whereNotNull('id_lampiran')
                    ->pluck('id_lampiran');
                $total = DB::table('takes')
                    ->wherein('id_lampiran', $lamp)
                    ->where('kecamatan', $id_kec)
                    ->count();
                return isset($total) ? $total : '';

                break;
            case '2':
                $lamp = DB::table('lampirans')
                    ->wherein('id_reg', $reg)
                    ->where('id_jnsprk', $idjnsprk)
                    ->where('hasil_uji', '>=', '0.5')
                    ->whereNotNull('id_lampiran')
                    ->pluck('id_lampiran');
                $total = DB::table('takes')
                    ->wherein('id_lampiran', $lamp)
                    ->where('kecamatan', $id_kec)
                    ->count();
                return isset($total) ? $total : '';

                break;
            case '3':
                $lamp = DB::table('lampirans')
                    ->wherein('id_reg', $reg)
                    ->where('id_jnsprk', $idjnsprk)
                    ->where('hasil_uji', '>=', '0.3')
                    ->whereNotNull('id_lampiran')
                    ->pluck('id_lampiran');
                $total = DB::table('takes')
                    ->wherein('id_lampiran', $lamp)
                    ->where('kecamatan', $id_kec)
                    ->count();
                return isset($total) ? $total : '';

                break;

            case '4':
                $lamp = DB::table('lampirans')
                    ->wherein('id_reg', $reg)
                    ->where('id_jnsprk', $idjnsprk)
                    ->where('hasil_uji', '>=', '2.4')
                    ->whereNotNull('id_lampiran')
                    ->pluck('id_lampiran');
                $total = DB::table('takes')
                    ->wherein('id_lampiran', $lamp)
                    ->where('kecamatan', $id_kec)
                    ->count();
                return isset($total) ? $total : '';

                break;
            case '5':
                $lamp = DB::table('lampirans')
                    ->wherein('id_reg', $reg)
                    ->where('id_jnsprk', $idjnsprk)
                    ->where('hasil_uji', '>=', '125')
                    ->whereNotNull('id_lampiran')
                    ->pluck('id_lampiran');
                $total = DB::table('takes')
                    ->wherein('id_lampiran', $lamp)
                    ->where('kecamatan', $id_kec)
                    ->count();
                return isset($total) ? $total : '';

                break;

            case '6':
                // substr("testers", -1); // returns "s"

                $lamp = DB::table('lampirans')
                    ->select('id_lampiran', 'hasil_uji')
                    ->wherein('id_reg', $reg)
                    ->where('id_jnsprk', $idjnsprk)
                    ->whereNotNull('id_lampiran')
                    ->get();

                foreach ($lamp as $i => $data) {
                    $chek = substr($data->hasil_uji, -1);
                    if ($chek >= 2) {
                        $valid = [$data->id_lampiran];
                    }
                }
                if (empty($valid)) {
                    $valid = ['0'];
                }

                $total = DB::table('takes')
                    ->wherein('id_lampiran', $valid)
                    ->where('kecamatan', $id_kec)
                    ->count();
                return isset($total) ? $total : '';

                break;

            case '7':
                $lamp = DB::table('lampirans')
                    ->select('id_lampiran', 'hasil_uji')
                    ->wherein('id_reg', $reg)
                    ->where('id_jnsprk', $idjnsprk)
                    ->whereNotNull('id_lampiran')
                    ->get();

                foreach ($lamp as $i => $data) {
                    $chek = substr($data->hasil_uji, -1);
                    if ($chek >= 1) {
                        $valid = [$data->id_lampiran];
                    }
                }
                if (empty($valid)) {
                    $valid = ['0'];
                }

                $total = DB::table('takes')
                    ->wherein('id_lampiran', $valid)
                    ->where('kecamatan', $id_kec)
                    ->count();
                return isset($total) ? $total : '';

                break;

            case '8':
                $lamp = DB::table('lampirans')
                    ->select('id_lampiran', 'hasil_uji')
                    ->wherein('id_reg', $reg)
                    ->where('id_jnsprk', $idjnsprk)
                    ->whereNotNull('id_lampiran')
                    ->get();

                foreach ($lamp as $i => $data) {
                    $chek = substr($data->hasil_uji, -1);
                    if ($chek >= 6) {
                        $valid = [$data->id_lampiran];
                    }
                }
                if (empty($valid)) {
                    $valid = ['0'];
                }

                $total = DB::table('takes')
                    ->wherein('id_lampiran', $valid)
                    ->where('kecamatan', $id_kec)
                    ->count();
                return isset($total) ? $total : '';

                break;

            default:
                $total = 'Not Define';
                return isset($total) ? $total : '';

                break;
        }
    }
}

if (!function_exists('analis_peta_pasif_kab')) {
    function analis_peta_pasif_kab($idjnsprk, $df, $dt, $id_kab)
    {
        $id_kec = DB::table('districts')
            ->where('regency_id', $id_kab)
            ->pluck('id');
        $menu = DB::table('jnsprks')
            ->where('id', $idjnsprk)
            ->first();
        $id_menu = $menu->peta;

        $reg = DB::table('regs')
            ->wherebetween('tgl', [$df, $dt])
            ->pluck('id');

        switch ($id_menu) {
            case '1':
                $lamp = DB::table('lampirans')
                    ->wherein('id_reg', $reg)
                    ->where('id_jnsprk', $idjnsprk)
                    ->where('hasil_uji', 'like', '%positif%')
                    ->whereNotNull('id_lampiran')
                    ->pluck('id_lampiran');
                $total = DB::table('takes')
                    ->wherein('id_lampiran', $lamp)
                    ->wherein('kecamatan', $id_kec)
                    //->where('kecamatan',$id_kec)
                    ->count();
                return isset($total) ? $total : '';

                break;
            case '2':
                $lamp = DB::table('lampirans')
                    ->wherein('id_reg', $reg)
                    ->where('id_jnsprk', $idjnsprk)
                    ->where('hasil_uji', '>=', '0.5')
                    ->whereNotNull('id_lampiran')
                    ->pluck('id_lampiran');
                $total = DB::table('takes')
                    ->wherein('id_lampiran', $lamp)
                    //->where('kecamatan',$id_kec)
                    ->wherein('kecamatan', $id_kec)
                    ->count();
                return isset($total) ? $total : '';

                break;
            case '3':
                $lamp = DB::table('lampirans')
                    ->wherein('id_reg', $reg)
                    ->where('id_jnsprk', $idjnsprk)
                    ->where('hasil_uji', '>=', '0.3')
                    ->whereNotNull('id_lampiran')
                    ->pluck('id_lampiran');
                $total = DB::table('takes')
                    ->wherein('id_lampiran', $lamp)
                    ->wherein('kecamatan', $id_kec)
                    //->where('kecamatan',$id_kec)
                    ->count();
                return isset($total) ? $total : '';

                break;

            case '4':
                $lamp = DB::table('lampirans')
                    ->wherein('id_reg', $reg)
                    ->where('id_jnsprk', $idjnsprk)
                    ->where('hasil_uji', '>=', '2.4')
                    ->whereNotNull('id_lampiran')
                    ->pluck('id_lampiran');
                $total = DB::table('takes')
                    ->wherein('id_lampiran', $lamp)
                    ->wherein('kecamatan', $id_kec)
                    //->where('kecamatan',$id_kec)
                    ->count();
                return isset($total) ? $total : '';

                break;
            case '5':
                $lamp = DB::table('lampirans')
                    ->wherein('id_reg', $reg)
                    ->where('id_jnsprk', $idjnsprk)
                    ->where('hasil_uji', '>=', '125')
                    ->whereNotNull('id_lampiran')
                    ->pluck('id_lampiran');
                $total = DB::table('takes')
                    ->wherein('id_lampiran', $lamp)
                    ->wherein('kecamatan', $id_kec)
                    //->where('kecamatan',$id_kec)
                    ->count();
                return isset($total) ? $total : '';

                break;

            case '6':
                // substr("testers", -1); // returns "s"

                $lamp = DB::table('lampirans')
                    ->select('id_lampiran', 'hasil_uji')
                    ->wherein('id_reg', $reg)
                    ->where('id_jnsprk', $idjnsprk)
                    ->whereNotNull('id_lampiran')
                    ->get();

                foreach ($lamp as $i => $data) {
                    $chek = substr($data->hasil_uji, -1);
                    if ($chek >= 2) {
                        $valid = [$data->id_lampiran];
                    }
                }
                if (empty($valid)) {
                    $valid = ['0'];
                }

                $total = DB::table('takes')
                    ->wherein('id_lampiran', $valid)
                    ->wherein('kecamatan', $id_kec)
                    // ->where('kecamatan',$id_kec)
                    ->count();
                return isset($total) ? $total : '';

                break;

            case '7':
                $lamp = DB::table('lampirans')
                    ->select('id_lampiran', 'hasil_uji')
                    ->wherein('id_reg', $reg)
                    ->where('id_jnsprk', $idjnsprk)
                    ->whereNotNull('id_lampiran')
                    ->get();

                foreach ($lamp as $i => $data) {
                    $chek = substr($data->hasil_uji, -1);
                    if ($chek >= 1) {
                        $valid = [$data->id_lampiran];
                    }
                }
                if (empty($valid)) {
                    $valid = ['0'];
                }

                $total = DB::table('takes')
                    ->wherein('id_lampiran', $valid)
                    ->wherein('kecamatan', $id_kec)
                    // ->where('kecamatan',$id_kec)
                    ->count();
                return isset($total) ? $total : '';

                break;

            case '8':
                $lamp = DB::table('lampirans')
                    ->select('id_lampiran', 'hasil_uji')
                    ->wherein('id_reg', $reg)
                    ->where('id_jnsprk', $idjnsprk)
                    ->whereNotNull('id_lampiran')
                    ->get();

                foreach ($lamp as $i => $data) {
                    $chek = substr($data->hasil_uji, -1);
                    if ($chek >= 6) {
                        $valid = [$data->id_lampiran];
                    }
                }
                if (empty($valid)) {
                    $valid = ['0'];
                }

                $total = DB::table('takes')
                    ->wherein('id_lampiran', $valid)
                    ->wherein('kecamatan', $id_kec)
                    // ->where('kecamatan',$id_kec)
                    ->count();
                return isset($total) ? $total : '';

                break;

            default:
                $total = 'Not Define';
                return isset($total) ? $total : '';

                break;
        }
    }
}

if (!function_exists('jumlah_uji_pasif')) {
    function jumlah_uji_pasif($idjnsprk, $df, $dt, $id_kec)
    {
        $reg = DB::table('regs')
            ->wherebetween('tgl', [$df, $dt])
            ->pluck('id');

        $lamp = DB::table('lampirans')
            ->wherein('id_reg', $reg)
            ->where('id_jnsprk', $idjnsprk)
            // ->where('hasil_uji', 'like', '%positif%')
            // ->whereNotNull('id_lampiran')
            ->pluck('id_lampiran');
        $total = DB::table('takes')
            ->wherein('id_lampiran', $lamp)
            ->where('kecamatan', $id_kec)
            ->count();

        return isset($total) ? $total : '';
    }
}

if (!function_exists('jumlah_uji_pasif_kab')) {
    function jumlah_uji_pasif_kab($idjnsprk, $df, $dt, $id_kab)
    {
        $reg = DB::table('regs')
            ->wherebetween('tgl', [$df, $dt])
            ->pluck('id');

        $id_kec = DB::table('districts')
            ->where('regency_id', $id_kab)
            ->pluck('id');
        $lamp = DB::table('lampirans')
            ->wherein('id_reg', $reg)
            ->where('id_jnsprk', $idjnsprk)
            // ->where('hasil_uji', 'like', '%positif%')
            // ->whereNotNull('id_lampiran')
            ->pluck('id_lampiran');
        $total = DB::table('takes')
            ->wherein('id_lampiran', $lamp)
            //->where('kecamatan',$id_kec)
            ->wherein('kecamatan', $id_kec)
            ->count();

        return isset($total) ? $total : '';
    }
}

if (!function_exists('jumlah_uji_aktif')) {
    function jumlah_uji_aktif($idjnsprk, $df, $dt, $id_kec)
    {
        $reg = DB::table('regs')
            ->select('regs.id', 'customers.district_id')
            ->join('customers', 'customers.id', '=', 'regs.id_customer')
            ->where('district_id', $id_kec)
            ->wherebetween('tgl', [$df, $dt])
            ->get();

        $total = 0;

        foreach ($reg as $i => $data) {
            $total_positif = DB::table('lampirans')
                ->where('id_jnsprk', $idjnsprk)
                ->where('id_reg', $data->id)
                ->count();
            $total = $total_positif + $total;
        }

        return isset($total) ? $total : '';
    }
}

if (!function_exists('graph_populasi')) {
    function graph_populasi($idjnsprk, $bulan, $tahun, $id_kec)
    {
        $reg = DB::table('regs')
            ->wheremonth('tgl', $bulan)
            ->whereYear('tgl', $tahun)
            ->pluck('id');
        $lamp = DB::table('lampirans')
            ->wherein('id_reg', $reg)
            ->where('id_jnsprk', $idjnsprk)
            // ->where('hasil_uji', 'like', '%positif%')
            // ->whereNotNull('id_lampiran')
            ->pluck('id_lampiran');

        if (strlen($id_kec) == 4) {
            $id_kec = DB::table('districts')
                ->where('regency_id', $id_kec)
                ->pluck('id');
            $total = DB::table('takes')
                ->wherein('id_lampiran', $lamp)
                ->wherein('kecamatan', $id_kec)
                ->count();
        } else {
            $total = DB::table('takes')
                ->wherein('id_lampiran', $lamp)
                ->where('kecamatan', $id_kec)
                ->count();
        }
        return isset($total) ? $total : '';
    }
}

if (!function_exists('nama_district')) {
    function nama_district($id_district)
    {
        $rev = DB::table('districts')
            ->where('id', $id_district)
            ->first();
        return isset($rev->name) ? $rev->name : '';
    }
}

if (!function_exists('nama_kab')) {
    function nama_kab($id_district)
    {
        $rev = DB::table('regencies')
            ->where('id', $id_district)
            ->first();
        return isset($rev->name) ? $rev->name : '';
    }
}

if (!function_exists('nama_prks')) {
    function nama_prks($id_jnsprk)
    {
        $rev = DB::table('jnsprks')
            ->where('id', $id_jnsprk)
            ->first();
        return isset($rev->name) ? $rev->name : '';
    }
}

if (!function_exists('jumlah_pengambilan')) {
    function jumlah_pengambilan($idreg)
    {
        $jumlah = DB::table('takes')
            ->where('id_regs', $idreg)
            ->count();
        return isset($jumlah) ? $jumlah : '';
    }
}

if (!function_exists('graph_penyakit')) {
    function graph_penyakit($idjnsprk, $bulan, $tahun, $id_kec)
    {
        $menu = DB::table('jnsprks')
            ->where('id', $idjnsprk)
            ->first();
        $id_menu = $menu->peta;

        $reg = DB::table('regs')
            ->whereMonth('tgl', $bulan)
            ->whereYear('tgl', $tahun)
            ->pluck('id');

        if (strlen($id_kec) == 4) {
            $id_kec = DB::table('districts')
                ->where('regency_id', $id_kec)
                ->pluck('id');

            switch ($id_menu) {
                case '1':
                    $lamp = DB::table('lampirans')
                        ->wherein('id_reg', $reg)
                        ->where('id_jnsprk', $idjnsprk)
                        ->where('hasil_uji', 'like', '%positif%')
                        ->whereNotNull('id_lampiran')
                        ->pluck('id_lampiran');
                    $total = DB::table('takes')
                        ->wherein('id_lampiran', $lamp)
                        ->wherein('kecamatan', $id_kec)
                        ->count();
                    return isset($total) ? $total : '';

                    break;
                case '2':
                    $lamp = DB::table('lampirans')
                        ->wherein('id_reg', $reg)
                        ->where('id_jnsprk', $idjnsprk)
                        ->where('hasil_uji', '>=', '0.5')
                        ->whereNotNull('id_lampiran')
                        ->pluck('id_lampiran');
                    $total = DB::table('takes')
                        ->wherein('id_lampiran', $lamp)
                        ->wherein('kecamatan', $id_kec)
                        //->where('kecamatan',$id_kec)
                        ->count();
                    return isset($total) ? $total : '';

                    break;
                case '3':
                    $lamp = DB::table('lampirans')
                        ->wherein('id_reg', $reg)
                        ->where('id_jnsprk', $idjnsprk)
                        ->where('hasil_uji', '>=', '0.3')
                        ->whereNotNull('id_lampiran')
                        ->pluck('id_lampiran');
                    $total = DB::table('takes')
                        ->wherein('id_lampiran', $lamp)
                        // ->where('kecamatan',$id_kec)
                        ->wherein('kecamatan', $id_kec)
                        ->count();
                    return isset($total) ? $total : '';

                    break;

                case '4':
                    $lamp = DB::table('lampirans')
                        ->wherein('id_reg', $reg)
                        ->where('id_jnsprk', $idjnsprk)
                        ->where('hasil_uji', '>=', '2.4')
                        ->whereNotNull('id_lampiran')
                        ->pluck('id_lampiran');
                    $total = DB::table('takes')
                        ->wherein('id_lampiran', $lamp)
                        // ->where('kecamatan',$id_kec)
                        ->wherein('kecamatan', $id_kec)
                        ->count();
                    return isset($total) ? $total : '';

                    break;
                case '5':
                    $lamp = DB::table('lampirans')
                        ->wherein('id_reg', $reg)
                        ->where('id_jnsprk', $idjnsprk)
                        ->where('hasil_uji', '>=', '125')
                        ->whereNotNull('id_lampiran')
                        ->pluck('id_lampiran');
                    $total = DB::table('takes')
                        ->wherein('id_lampiran', $lamp)
                        // ->where('kecamatan',$id_kec)
                        ->wherein('kecamatan', $id_kec)
                        ->count();
                    return isset($total) ? $total : '';

                    break;

                case '6':
                    // substr("testers", -1); // returns "s"

                    $lamp = DB::table('lampirans')
                        ->select('id_lampiran', 'hasil_uji')
                        ->wherein('id_reg', $reg)
                        ->where('id_jnsprk', $idjnsprk)
                        ->whereNotNull('id_lampiran')
                        ->get();

                    foreach ($lamp as $i => $data) {
                        $chek = substr($data->hasil_uji, -1);
                        if ($chek >= 2) {
                            $valid = [$data->id_lampiran];
                        }
                    }
                    if (empty($valid)) {
                        $valid = ['0'];
                    }

                    $total = DB::table('takes')
                        ->wherein('id_lampiran', $valid)
                        // ->where('kecamatan',$id_kec)
                        ->wherein('kecamatan', $id_kec)
                        ->count();
                    return isset($total) ? $total : '';

                    break;

                case '7':
                    $lamp = DB::table('lampirans')
                        ->select('id_lampiran', 'hasil_uji')
                        ->wherein('id_reg', $reg)
                        ->where('id_jnsprk', $idjnsprk)
                        ->whereNotNull('id_lampiran')
                        ->get();

                    foreach ($lamp as $i => $data) {
                        $chek = substr($data->hasil_uji, -1);
                        if ($chek >= 1) {
                            $valid = [$data->id_lampiran];
                        }
                    }
                    if (empty($valid)) {
                        $valid = ['0'];
                    }

                    $total = DB::table('takes')
                        ->wherein('id_lampiran', $valid)
                        //->where('kecamatan',$id_kec)
                        ->wherein('kecamatan', $id_kec)
                        ->count();
                    return isset($total) ? $total : '';

                    break;

                case '8':
                    $lamp = DB::table('lampirans')
                        ->select('id_lampiran', 'hasil_uji')
                        ->wherein('id_reg', $reg)
                        ->where('id_jnsprk', $idjnsprk)
                        ->whereNotNull('id_lampiran')
                        ->get();

                    foreach ($lamp as $i => $data) {
                        $chek = substr($data->hasil_uji, -1);
                        if ($chek >= 6) {
                            $valid = [$data->id_lampiran];
                        }
                    }
                    if (empty($valid)) {
                        $valid = ['0'];
                    }

                    $total = DB::table('takes')
                        ->wherein('id_lampiran', $valid)
                        ->wherein('kecamatan', $id_kec)
                        //->where('kecamatan',$id_kec)
                        ->count();
                    return isset($total) ? $total : '';

                    break;

                default:
                    $total = 'Not Define';
                    return isset($total) ? $total : '';

                    break;
            }
        } else {
            switch ($id_menu) {
                case '1':
                    $lamp = DB::table('lampirans')
                        ->wherein('id_reg', $reg)
                        ->where('id_jnsprk', $idjnsprk)
                        ->where('hasil_uji', 'like', '%positif%')
                        ->whereNotNull('id_lampiran')
                        ->pluck('id_lampiran');
                    $total = DB::table('takes')
                        ->wherein('id_lampiran', $lamp)
                        ->where('kecamatan', $id_kec)
                        ->count();
                    return isset($total) ? $total : '';

                    break;
                case '2':
                    $lamp = DB::table('lampirans')
                        ->wherein('id_reg', $reg)
                        ->where('id_jnsprk', $idjnsprk)
                        ->where('hasil_uji', '>=', '0.5')
                        ->whereNotNull('id_lampiran')
                        ->pluck('id_lampiran');
                    $total = DB::table('takes')
                        ->wherein('id_lampiran', $lamp)
                        ->where('kecamatan', $id_kec)
                        ->count();
                    return isset($total) ? $total : '';

                    break;
                case '3':
                    $lamp = DB::table('lampirans')
                        ->wherein('id_reg', $reg)
                        ->where('id_jnsprk', $idjnsprk)
                        ->where('hasil_uji', '>=', '0.3')
                        ->whereNotNull('id_lampiran')
                        ->pluck('id_lampiran');
                    $total = DB::table('takes')
                        ->wherein('id_lampiran', $lamp)
                        ->where('kecamatan', $id_kec)
                        ->count();
                    return isset($total) ? $total : '';

                    break;

                case '4':
                    $lamp = DB::table('lampirans')
                        ->wherein('id_reg', $reg)
                        ->where('id_jnsprk', $idjnsprk)
                        ->where('hasil_uji', '>=', '2.4')
                        ->whereNotNull('id_lampiran')
                        ->pluck('id_lampiran');
                    $total = DB::table('takes')
                        ->wherein('id_lampiran', $lamp)
                        ->where('kecamatan', $id_kec)
                        ->count();
                    return isset($total) ? $total : '';

                    break;
                case '5':
                    $lamp = DB::table('lampirans')
                        ->wherein('id_reg', $reg)
                        ->where('id_jnsprk', $idjnsprk)
                        ->where('hasil_uji', '>=', '125')
                        ->whereNotNull('id_lampiran')
                        ->pluck('id_lampiran');
                    $total = DB::table('takes')
                        ->wherein('id_lampiran', $lamp)
                        ->where('kecamatan', $id_kec)
                        ->count();
                    return isset($total) ? $total : '';

                    break;

                case '6':
                    // substr("testers", -1); // returns "s"

                    $lamp = DB::table('lampirans')
                        ->select('id_lampiran', 'hasil_uji')
                        ->wherein('id_reg', $reg)
                        ->where('id_jnsprk', $idjnsprk)
                        ->whereNotNull('id_lampiran')
                        ->get();

                    foreach ($lamp as $i => $data) {
                        $chek = substr($data->hasil_uji, -1);
                        if ($chek >= 2) {
                            $valid = [$data->id_lampiran];
                        }
                    }
                    if (empty($valid)) {
                        $valid = ['0'];
                    }

                    $total = DB::table('takes')
                        ->wherein('id_lampiran', $valid)
                        ->where('kecamatan', $id_kec)
                        ->count();
                    return isset($total) ? $total : '';

                    break;

                case '7':
                    $lamp = DB::table('lampirans')
                        ->select('id_lampiran', 'hasil_uji')
                        ->wherein('id_reg', $reg)
                        ->where('id_jnsprk', $idjnsprk)
                        ->whereNotNull('id_lampiran')
                        ->get();

                    foreach ($lamp as $i => $data) {
                        $chek = substr($data->hasil_uji, -1);
                        if ($chek >= 1) {
                            $valid = [$data->id_lampiran];
                        }
                    }
                    if (empty($valid)) {
                        $valid = ['0'];
                    }

                    $total = DB::table('takes')
                        ->wherein('id_lampiran', $valid)
                        ->where('kecamatan', $id_kec)
                        ->count();
                    return isset($total) ? $total : '';

                    break;

                case '8':
                    $lamp = DB::table('lampirans')
                        ->select('id_lampiran', 'hasil_uji')
                        ->wherein('id_reg', $reg)
                        ->where('id_jnsprk', $idjnsprk)
                        ->whereNotNull('id_lampiran')
                        ->get();

                    foreach ($lamp as $i => $data) {
                        $chek = substr($data->hasil_uji, -1);
                        if ($chek >= 6) {
                            $valid = [$data->id_lampiran];
                        }
                    }
                    if (empty($valid)) {
                        $valid = ['0'];
                    }

                    $total = DB::table('takes')
                        ->wherein('id_lampiran', $valid)
                        ->where('kecamatan', $id_kec)
                        ->count();
                    return isset($total) ? $total : '';

                    break;

                default:
                    $total = 'Not Define';
                    return isset($total) ? $total : '';

                    break;
            }
        }
    }
}

if (!function_exists('chek_inv')) {
    function chek_inv($idreg)
    {
        $jumlah = DB::table('invoices')
            ->where('id_reg', $idreg)
            ->count();
        return isset($jumlah) ? $jumlah : '';
    }
}

if (!function_exists('imginv')) {
    function imginv($idreg)
    {
        $data = DB::table('invoices')
            ->where('id_reg', $idreg)
            ->first();
        return isset($data->file_upload) ? $data->file_upload : '';
    }
}

if (!function_exists('jml')) {
    function jml($idreg)
    {
        $data = DB::table('basic_samples')
            ->where('id_regs', $idreg)
            ->first();
        return isset($data->jumlah) ? $data->jumlah : '';
    }
}

if (!function_exists('modal')) {
    function modal($idreg)
    {
        $data = DB::table('regs')
            ->where('id_regs', $idreg)
            ->get();
        //$jumlah = $data->jumlah;
        return isset($data) ? $data : '';
    }
}

if (!function_exists('spasi')) {
    function spasi()
    {
        return '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    }
}

if (!function_exists('divnum')) {
    function divnum($numerator, $denominator)
    {
        return $denominator == 0 ? 0 : $numerator / $denominator;
    }
}
