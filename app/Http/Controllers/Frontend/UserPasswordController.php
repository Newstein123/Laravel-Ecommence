<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PasswordUpdateRequest;
use Illuminate\Validation\ValidationException;

class UserPasswordController extends Controller
{
    public function passwordEdit()
    {   
 
       return view('frontend.collections.profile.updatepassword');
    }
    public function passwordUpdate(PasswordUpdateRequest $request, $id)
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
     
      
       return redirect('/profile')->with('message', 'A password is updated successfully');
       }
}
