<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;


class UserController extends Controller
{
    
    public function login(){
        return view('user.login');
    }//end method

    
    public function register(){
        return view('user.register');

    }//end method

    public function userUpdate(Request $request){

// dd($request);

$user = User::findOrFail(Auth::id());

        if ($request->file('photo')) {
            if (file_exists(public_path($user->photo))) {
                @unlink(public_path($user->photo));
            }
            
            $newName = time().'.'.$request->file('photo')->getClientOriginalExtension();
            $user->photo = 'uploads/'.$newName;
            Image::make($request->file('photo'))
                ->resize(1200, 1200)
                ->save(public_path($user->photo));
        }
       User::findOrFail(Auth::id())->update([
            'name' => $request->name,
            'email' => $request->email,
            'photo' => $user->photo
        ]);
        
        return redirect()->back();
        // return response()->json(['success' => 'User profile updated successfuly']);

    }//end method



















    // public function store_user(Request $request){
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required',
    //         'name' => 'required',
    //         'name' => 'required',
    //     ]);
    //     return "hello";
    // }


    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     return redirect()->intended(RouteServiceProvider::HOME);
    // }

}
