<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\NoteRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function create(NoteRequest $request)
    {
        User::create($request->all());
        return redirect()->route('users.index');
    }   

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users', compact('user'));
    }

    public function update(NoteRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }
}