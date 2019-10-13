<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CreateUserRequest;

class UsersController extends Controller
{
    public function index() {
    	$users = User::paginate(50);
    	return view('admin.users.index', compact('users'));
    }

    public function create() {
    	return view('admin.users.create');
    }

    public function store(CreateUserRequest $request) {
        $user = User::create(request()->all());
    	return redirect('admin/users');

    }

    public function edit($id) {
    	$user = User::findOrFail($id);
    	return view('admin.users.edit', compact('user'));
    }

    public function update(CreateUserRequest $request, $id){
    	$user = User::findOrFail($id);
        $user->update(request()->all());
    	return back();
    }

    public function destroy($id){
    	$user = User::findOrFail($id);
    	$user->delete();
    	return redirect('admin/users');
    }

}

