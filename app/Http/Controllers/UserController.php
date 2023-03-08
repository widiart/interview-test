<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;

class UserController extends Controller
{
    
    public function index(Request $request) 
    {
        $model = User::paginate(15);
        $column = [
            ['field' => 'id', 'label' => 'ID'],
            ['field' => 'name', 'label' => 'Name'],
            ['field' => 'email', 'label' => 'Email'],
            ['field' => 'created_at', 'label' => 'Created Date'],
        ];
        return view('user.index',compact('model','column'));
    }
}
