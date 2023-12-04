<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
 
class UserControl extends Controller
{
    public function index(): View
    {
        // Ambil data terbaru users max 5 per page
        $posts = User::latest()->paginate(5);
 
        return view('admin.users', ['users' => $posts]);
    }

    public function create(): View
    {
        return view('admin.add');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validate Form
        $this->validate($request, [
            'name'        => 'required|min:5',
            'price'       => 'required|min:4',
            'category'    => 'required|min:5',
            'image'       => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'description' => 'required|min:5',
        ]);

        // Upload Image
        $image = $request->file('image');
        $image->storeAs('public/img', $image->hashName());

        // Ubah kurs menjadi angka
        $price = $request->price;
        $price = str_replace('.', '', $price);

        // Mengisi hasil data input ke database 
        User::create([
            'name'         => $request->name,
            'price'        => $price,
            'category'     => $request->category,
            'image'        => $image->hashName(),
            'description'  => $request->description,
        ]);

        // Redirect ke page users
        return redirect()->route('admin.content.users')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        // Ambil data berdasarkan ID
        $post = User::findOrFail($id);

        // Menampilkan hasil data
        return view('admin.users', ['users' => $post]);
    }

    public function edit(string $id): View
    {
        // Ambil data berdasarkan ID
        $post = User::findOrFail($id);

        // Menampilkan halaman edit
        return view('admin.edit', ['users' => $post]);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        // Validate form
        $this->validate($request, [
            'status'      => 'required'
        ]);

        // Ambil data berdasarkan ID
        $post = User::findOrFail($id);

        $post->update([
            'status'         => $request->status
        ]);

        // Kembali ke halaman users
        return redirect()->route('admin.content.users')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(string $id): RedirectResponse
    {
        // Ambil data berdasarkan ID
        $post = User::findOrFail($id);

        // Hapus data
        $post->delete();

        // Kembali ke halaman users
        return redirect()->route('admin.content.users')->with(['success' => 'Berhasil Hapus Data!']);
    }
}
