<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    //
    public function index() {
        $permissions = Permission::all();
        return view('admin.permissions.index', ['permissions'=>$permissions]);
    }

    public function store() {

        request()->validate([
            'name'=>['required']
        ]);

        Permission::create([
            'name'=>Str::ucfirst(request('name')),
            'slug'=>Str::of(Str::lower(request('name')))->slug('-')
        ]);

        return back();
    }

    public function edit(Permission $permission) {
        return view('admin.permissions.edit', ['permission'=>$permission]);
    }

    public function update(Permission $permission) {

        request()->validate([
            'name'=>['required']
        ]);
            
        $permission->name = request('name');
        $permission->slug = Str::of(Str::lower(request('name')))->slug('-');

        if($permission->isDirty('name')) {   

            session()->flash('update-msg', 'The Permission Has Been Updated');
            $permission->save();

        } else {
            session()->flash('update-msg', 'Nothing Has Been Updated'); 
        }

        return redirect()->route('permissions.index');
    }

    public function destroy(Permission $permission) {
        $permission->delete();
        session()->flash('delete-msg', 'The Permission Has Been Deleted');
        return back();
    }
}
