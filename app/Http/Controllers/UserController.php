<?php


namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {
       

        $permissions = is_array($request->permission) ? implode(',', $request->permission) : $request->permission;




        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'permission' => $request->permission,
            'password' => Hash::make($request->password),
        ]);




        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }



    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }


    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|string',
            'permission' => 'required|string',
        ]);


        $user = User::findOrFail($id);
        $user->update($request->only(['name', 'email', 'role', 'permission']));


        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }


    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
