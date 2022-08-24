<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\User;

class ProfileController extends Controller
{
    public function index ()
   {
    return view('/admin/profile/index');
   }

    public function edit ($id) {
    User::find($id);
    $user = auth()->user();
    return view('/admin/profile/edit');
   }

   public function update (ProfileRequest $request,$id)
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

          return redirect('/admin/profile',)->with('message', 'profile was updated successfully');

   }
    public function destroy ()
   {
    return view('/profile');
   }
}
