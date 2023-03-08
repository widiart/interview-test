<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ApiController extends Controller
{
    function user() {
        try {
            $user = User::all();
            $status = true;
            $message = 'Success';
        } catch (Throwable $e) {
            $user = [];
            $status = false;
            $message = 'Fail';
        }

        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $user,
        ], 200);
    }
}
