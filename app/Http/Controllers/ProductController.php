<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index(Request $request) 
    {
        $api = Http::asForm()
            ->post('http://149.129.221.143/kanaldata/Webservice/bank_account', [
                'bank_id' => '2',
            ]);

        $data = $api->body();
        return view('product.index',compact('data'));
    }
}
