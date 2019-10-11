<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CreateUserRequest;

class UsersController extends Controller
{
    public function index() {
    	$users = User::paginate(1);
    	return view('admin.users.index', compact('users'));
    }

    public function create() {
    	return view('admin.users.create');
    }

    public function store(CreateUserRequest $request) {
    	$user = new User();
    	$user->name = request('name');
    	$user->email = request('email');
    	$user->password = bcrypt(request('password'));
    	$user->admin = request('admin');
    	$user->block = request()->has('block');
    	$user->image = $user->image ? $user->getImagePath('image') : null;
    	$user->save();
    	return redirect('admin/users');

    }

    public function edit($id) {
    	$user = User::findOrFail($id);
    	return view('admin.users.edit', compact('user'));
    }

    public function update(CreateUserRequest $request, $id){
    	$user = User::findOrFail($id);
    	$user->name = request('name');
    	$user->email = request('email');
    	$user->password = bcrypt(request('password'));
    	$user->admin = request('admin');
    	$user->block = request()->has('block');
    	if(request()->has('image')){
    		File::delete($user->image);
    		$user->image = $user->getImagePath('image');

    	}
    	$user->save();
    	return back();
    }

    public function destroy($id){
    	$user = User::findOrFail($id);
    	$user->delete();
    	return redirect('admin/users');
    }

}

