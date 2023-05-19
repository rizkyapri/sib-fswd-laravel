<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;



class UserController extends Controller
{
    public function index() // Untuk menampilkan daftar data
    {
        $users = user::all();
        return view('user.index', ['users' => $users]);
    }

    public function show() // Untuk menampilkan table data user
    {
        // return view('user.tableUser');
    }
    public function detail($id) // Untuk menampilkan detail data user by id
    {
        // $userId = $request->get('id');
        $user = User::find($id);
        // Lakukan penanganan jika data pengguna tidak ditemukan
        if (!$user) {
            abort(404);
        }

        return view('user.detail', ['user' => $user]);
    }
    public function create() // Untuk menampilkan halaman formulir tambah data.
    {
        return view('user.tambahUser');
    }
    public function edit() // Untuk menampilkan halaman formulir edit data
    {
        return view('user.editUser');
    }
    public function store(Request $request)
    {
        // Validasi input data jika diperlukan
        $validatedData = $request->validate([
            'nama' => 'required',
            'pilihrole' => 'required',
            'email' => 'required|email',
            'telp' => 'required',
            'alamat' => 'required',
            'file' => 'required|file',
        ]);

        // Simpan data ke dalam database
        $user = new User();
        $user->nama = $request->nama;
        $user->role = $request->pilihrole;
        $user->email = $request->email;
        $user->telp = $request->telp;
        $user->alamat = $request->alamat;

        // Proses unggah file jika diperlukan
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            // Lakukan operasi pengolahan file yang diperlukan (misalnya, simpan di direktori tertentu, ubah nama file, dll.)
            // Contoh: $file->store('public/images');
            // $user->file = $file->hashName(); // Contoh: Simpan nama file yang dihasilkan ke dalam kolom 'file' pada tabel user
        }

        // Simpan data ke dalam database
        $user->save();

        // Redirect ke halaman index atau halaman terkait lainnya
        return redirect()->route('user.index');
    }

    public function update() // Untuk memperbarui data
    {
    }
    public function destroy() // Untuk menghapus data
    {
    }
}
