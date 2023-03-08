<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

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

    public function ajax_refresh(Request $request) 
    {
        $model = User::paginate(15);
        $column = [
            ['field' => 'id', 'label' => 'ID'],
            ['field' => 'name', 'label' => 'Name'],
            ['field' => 'email', 'label' => 'Email'],
            ['field' => 'created_at', 'label' => 'Created Date'],
        ];
        return view('user.refresh',compact('model','column'))->render();
    }

    public function detail(Request $request,$id) 
    {
        if(empty($id)) {
            return redirect('/');
        }
        $model = User::find($id);
        
        $column = [
            ['field' => 'id', 'label' => 'ID'],
            ['field' => 'name', 'label' => 'Name'],
            ['field' => 'email', 'label' => 'Email'],
            ['field' => 'created_at', 'label' => 'Created Date'],
            ['field' => 'updated_at', 'label' => 'Updated Date'],
        ];

        return view('user.detail',compact('model','column'))->render();
    }

    public function create(Request $request) 
    {
        return view('user.create')->render();
    }

    public function update(Request $request,$id) 
    {
        if(empty($id)) {
            return redirect('/');
        }
        $model = User::find($id);
        
        return view('user.update',compact('model'))->render();
    }
 
    public function delete(Request $request,$id) 
    {
        if(empty($id)) {
            return redirect('/');
        }
        if($id == auth()->user()->id) {
            return ['status'=>'error','message'=>"Can't Delete Current User"];
        }
        $model = User::find($id);
        
        if($model->delete()){
            return ['status'=>'success','data'=>$model,'message'=>'User has been deleted.'];
        } else {
            return ['status'=>'error','message'=>'Error On Delete User'];
        }
    }

    public function store(Request $request,$id=null) 
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', \Illuminate\Validation\Rule::unique(User::class)->ignore(auth()->user()->id)],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if(empty($id)) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $message = 'User Has Been Created!';
        } else {
            $message = 'User Has Been Updated!';
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
        }
        
        if($user){
            return ['status'=>'success','data'=>$user,'message'=>$message];
        } else {
            return ['status'=>'error','message'=>'Error Create or Update'];
        }
    }
}
