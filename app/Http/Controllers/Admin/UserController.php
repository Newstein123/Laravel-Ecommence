<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Ui\Presets\React;

class UserController extends Controller
{
    public function index ()
    {   
        $users = User::all();
       return view('/admin/user/index', compact('users'));
    }
    public function create ()
    {   
       return view('/admin/user/create');
    }
    public function store (Request $request)
    {   

        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password), 
            'role_as' => $request->role_as == true? '1': '0',
        ]);

        return redirect('/admin/user')->with('message', 'A Profile was added successfully');
    }

    public function destroy ($id)
    {
        User::destroy($id);
        return redirect('/admin/user')->with('message', 'A profile was deleted successfully');
    }
}
