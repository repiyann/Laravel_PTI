<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Foods;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class FoodsController extends Controller
{
    public function index(): View
    {
        // Ambil data terbaru Foods max 5 per page
        $posts = Foods::latest()->paginate(5);

        // Kirim data posts ke admin.foods
        return view('admin.foods', compact('posts'));
    }

    public function create(): View  {
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
        Foods::create([
            'name'         => $request->name,
            'price'        => $price,
            'category'     => $request->category,
            'image'        => $image->hashName(),
            'description'  => $request->description,
        ]);

        // Redirect ke page Foods
        return redirect()->route('admin.content.foods')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        // Ambil data berdasarkan ID
        $post = Foods::findOrFail($id);

        // Menampilkan hasil data
        return view('admin.show', compact('post'));
    }

    public function edit(string $id): View
    {
        // Ambil data berdasarkan ID
        $post = Foods::findOrFail($id);

        // Menampilkan halaman edit
        return view('admin.edit', compact('post'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        // Validate form
        $this->validate($request, [
            'name'        => 'required|min:5',
            'price'       => 'required|min:4',
            'category'    => 'required|min:5',
            'image'       => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'description' => 'required|min:5',
        ]);

        // Ambil data berdasarkan ID
        $post = Foods::findOrFail($id);

        // Cek apakah gambar sudah diupload
        if ($request->hasFile('image')) {
            // Upload gambar baru
            $image = $request->file('image');
            $image->storeAs('public/img', $image->hashName());

            // Hapus gambar lama
            Storage::delete('public/img' . $post->image);

            // Update dengan gambar baru
            $post->update([
                'name'         => $request->name,
                'price'        => $request->price,
                'category'     => $request->category,
                'image'        => $image->hashName(),
                'description'  => $request->description,
            ]);
        } else {
            // Update tanpa gambar
            $post->update([
                'name'         => $request->name,
                'price'        => $request->price,
                'category'     => $request->category,
                'description'  => $request->description,
            ]);
        }

        // Kembali ke halaman Foods
        return redirect()->route('admin.content.foods')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(string $id): RedirectResponse
    {
        // Ambil data berdasarkan ID
        $post = Foods::findOrFail($id);

        // Hapus gambar
        Storage::delete('public/img' . $post->image);

        // Hapus data
        $post->delete();

        // Kembali ke halaman Foods
        return redirect()->route('admin.content.foods')->with(['success' => 'Berhasil Hapus Data!']);
    }
}
