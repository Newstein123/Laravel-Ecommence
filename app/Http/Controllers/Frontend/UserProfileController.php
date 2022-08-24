<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProfileController extends Controller
{
    public function profileIndex()
    {
       return view('frontend.collections.profile.index');
    }
    public function profileEdit()
    {
       return view('frontend.collections.profile.edit');
    }
    public function profileUpdate(Request $request, $id)
    { 
      $user = User::findOrFail($id);

      if($request->hasFile('image')) {

        // delete from database 

        $user->images()->delete();
        
        $file = $request->file('image');
        $filename = time(). '_'. $file->getClientOriginalName();
        $dir = public_path('/upload/images/');
        $file->move($dir,$filename);

        $user->images()->create([
            'path' => $filename,
        ]);
      } 

      $user->update([
        'name' => $request->name,
        'email' => $request->email,
      ]);

      return redirect('/profile',)->with('message', 'profile was updated successfully');

       return view('frontend.collections.profile.index');
    }
}
