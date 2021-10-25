<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function index() {

        $users = User::all();

        return view('admin.users.index', ['users'=>$users]);

    }

    public function create() {

        return view('admin.users.create');

    }

    public function store(User $user) {

            $inputs = request()->validate([
            'name'=>['required', 'string', 'max:255'],
            'email'=>['required','string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users', 'alpha_dash'],
            'avatar' => ['file'],
            'is-active'=>['required'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        
        // if($file = $request->file('avatar')) {

        //     $name = time(). $file->getClientOriginalName();

        //     $file->move(public_path('storage/images'), $name);

        //     $user['avatar'] = $name;

        // }

        // if(request()->hasFile('avatar')){

        //     $inputs['avatar'] = time(). '.' . request()->avatar->extension();
        //     request()->avatar->move('storage/images'), $inputs['avatar']);

        // }

        if(request('avatar')) {
            $inputs['avatar'] = request('avatar')->move('storage/images', $inputs['avatar']);
        }

        auth()->user()->create($inputs);

        // User::create([
        //     'name'=>request('name'),
        //     'email'=>request('email'),
        //     'username'=>request('username'),
        //     'avatar' =>request('avatar'), 
        //     'password'=>request('password')
        // ]);

        // auth()->user()->save();

        return redirect()->route('users.index');

        // // return dd(request('avatar'));

        // // return dd($request->all());

    }

    public function show(User $user) {

        return view('admin.users.profile', ['user'=>$user, 'roles'=>Role::all()]);

    }

    public function update(User $user) {

        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255', 'alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'avatar' => ['file'],
            // 'password'=>['min:6', 'max:255', 'confirmed']
        ]); 

        if(request('avatar')) {
            $inputs['avatar'] = request('avatar')->store('images');
        }

        $user->update($inputs);

        return back();
        
    }

    public function destroy($id) {

        $user= User::findOrFail($id);
        $user->delete();
        Session::flash('deleted', 'The User Has Been Deleted');

    }

    public function attach(User $user) {
      
        $user->roles()->attach(request('role'));       
        return back();

    }

    public function detach(User $user) {
      
        $user->roles()->detach(request('role'));       
        return back();
        
    }
    
    public function deleteUsers(Request $request) {

        if(isset($request->delete_single)) {
            $this->destroy($request->user);
            return back();
        }

        if(isset($request->delete_bulk) && !empty($request->checkBoxArray)) {

        $users = User::findOrFail($request->checkBoxArray);

        foreach($users as $user) {
            $user->delete();
        }

            return back();
        
        } else {

            return back();  

        }
        
    }
        
}
