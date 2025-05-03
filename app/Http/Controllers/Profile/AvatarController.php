<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request){
        //$path = $request->file('avatar')->store('avatars', 'public');

        $path = Storage::disk('public')->put('avatars', $request->file('avatar'));

        if($oldavatar =  $request->user()->avatar){
            Storage::disk('public')->delete($oldavatar);
        }


        auth()->user()->update(['avatar' => $path]);
        return redirect(route('profile.edit'))->with('message', 'Avatar is updated');
       //return back()->with('message', 'Avatar is changed');
    }
}
