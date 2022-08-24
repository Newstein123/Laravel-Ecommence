<?php

namespace App\Http\Controllers\admin;

use Illuminate\Foundation\Auth\User;
// use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PasswordUpdateRequest;
use Illuminate\Validation\ValidationException;

class PasswordUpdateController extends Controller
{
    public function edit ($id)
   {
    User::findOrFail($id);

    return view('admin/profile/passwordupdate');
   }

   public function update (PasswordUpdateRequest $request, $id)
   {
    $user = Auth::user();
    $currentpassword = $request->currentpassword;
    $oldpassword = $user->password;

   if(! Hash::check($currentpassword, $oldpassword)) {
    throw ValidationException::withMessages([
        'currentpassword' => 'The old password is wrong',
    ]);
   }

  
    $user->update([
    'password' => bcrypt($request->newpassword),

   ]);
 
  
   return redirect('/admin/profile')->with('message', 'A password is updated successfully');
   }
}
