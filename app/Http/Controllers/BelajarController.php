<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class BelajarController extends Controller
{
    public function index()
    {
        $coba['jumlah'] = 0;
        $coba['tambah'] = 'checked';
        $coba['kurang'] = '';
        $coba['kali'] = '';
        $coba['bagi'] = '';
        $coba['angka1'] = 0;
        $coba['angka2'] = 0;
        return view('belajar', $coba);
    }


    public function actionOperator(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        $coba['tambah'] = '';
        $coba['kurang'] = '';
        $coba['kali'] = '';
        $coba['bagi'] = '';
        if ($request->tipe == 'tambah') {
            $jumlah = $angka1 + $angka2;
            $coba['tambah'] = 'checked';
        } elseif ($request->tipe == 'kurang') {
            $jumlah = $angka1 - $angka2;
            $coba['kurang'] = 'checked';
        } elseif ($request->tipe == 'kali') {
            $jumlah = $angka1 * $angka2;
            $coba['kali'] = 'checked';
        } elseif ($request->tipe == 'bagi') {
            $jumlah = $angka1 / $angka2;
            $coba['bagi'] = 'checked';
        }

        $coba['jumlah'] = $jumlah;
        $coba['angka1'] = $angka1;
        $coba['angka2'] = $angka2;

        return view('belajar', $coba);
    }
}
