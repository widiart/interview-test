<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\TerbilangHelper;

class SoalController extends Controller
{
    public function swap(Request $request) 
    {
        $a = '5';
        $b = '2';

        return view('soal.swap',compact('a','b'));
    }

    public function terbilang(Request $request) 
    {
        $a = '300123';

        $terbilang = TerbilangHelper::convert($a);
        return view('soal.terbilang',compact('a','terbilang'));
    }

    public function terbilang_ajax(Request $request) 
    {
        $a = $request->angka;

        $terbilang = TerbilangHelper::convert($a);
        return $terbilang;
    }
}
