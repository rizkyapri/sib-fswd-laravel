<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Dotenv\Parser\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        // Ambil semua data user dari database
        $users = User::with('role')->get();

        // Tampilkan halaman index
        return view('user.index', compact('users'));
    }

    public function create()
    {
        // Ambil data roles dari database
        $roles = Role::all();

        // Tampilkan form create user dengan passing data roles
        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // Simpan data ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => $request->role,
            'password' => bcrypt('password') // default password, sementara di hardcode
        ]);

        // Redirect ke halaman user.index
        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        // Ambil data user berdasarkan id
        $user = User::find($id);

        // Ambil data roles dari database
        $roles = Role::all();

        // Tampilkan halaman edit dengan passing data user dan roles
        return view('user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|min:10|max:13',
         ]);

         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator->errors())->withInput();
         }
        // Ambil data user berdasarkan id
        $user = User::find($id);

        // Update data user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        // Redirect ke halaman user.index
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        // Ambil data user berdasarkan id
        $user = User::find($id);

        // Hapus data user
        $user->delete();

        // Redirect ke halaman user.index
        return redirect()->route('user.index');
    }
}
