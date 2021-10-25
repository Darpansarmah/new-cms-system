<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Permission;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    //
    public function index() {

        $roles = Role::all();

        return view('admin.roles.index', ['roles'=>$roles]);

    }

    public function store() {

        request()->validate([
            'name'=>['required']
        ]);

        Role::create([
            'name'=>Str::ucfirst(request('name')),
            'slug'=>Str::of(Str::lower(request('name')))->slug('-')
        ]);

        return back();

    }

    public function edit(Role $role) {
        $permissions = Permission::all();
        return view('admin.roles.edit', ['role'=>$role, 'permissions'=>$permissions]);
    }

    public function update(Role $role) {
        
        request()->validate([
            'name'=>['required']
        ]);
    
            $role->name = Str::ucfirst(request('name'));
            $role->slug = Str::of(Str::lower(request('name')))->slug('-');
            // $role->slug = Str::lower(request('name'));  
            
            if($role->isDirty('name')) {

                session()->flash('update-msg', 'Updated Role '. request('name'));
                $role->save();

            } else {

                session()->flash('update-msg', 'Nothing Has Been Updated');

            }

            return redirect()->route('roles.index');

    }

    public function destroy(Role $role) {

        $role->delete();
        session()->flash('delete-msg', 'The Role'.' '.$role->name.' '. 'Has Been Deleted');
        return back();

    }

    public function attach(Role $role) {
        $role->permissions()->attach(request('permission'));
        return back();
    }

    public function detach(Role $role) {
        $role->permissions()->detach(request('permission'));
        return back();
    }
}
