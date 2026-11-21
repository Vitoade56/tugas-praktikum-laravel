<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admin.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|max:100|unique:admins,username',
            'password' => 'required|min:6|max:100',
        ]);

        Admin::create($data);
        return redirect('/admin')->with('success', 'Data admin berhasil ditambahkan');
    }

    public function edit(Admin $admin)
    {
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request, Admin $admin)
    {
        $data = $request->validate([
            'username' => 'required|max:100|unique:admins,username,' . $admin->id_admin . ',id_admin',
            'password' => 'nullable|min:6|max:100',
        ]);

        if (empty($data['password'])) {
            unset($data['password']); // kosong = password tidak diubah
        }

        $admin->update($data);
        return redirect('/admin')->with('success', 'Data admin berhasil diubah');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect('/admin')->with('success', 'Data admin berhasil dihapus');
    }
}