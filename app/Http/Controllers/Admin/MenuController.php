<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataResto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategori = $request->input('kategori');

        $query = DataResto::query();

        if ($search) {
            $query->where('nama', 'LIKE', "%{$search}%");
        }

        if ($kategori && $kategori !== 'all') {
            $query->where('kategori', $kategori);
        }

        $menus = $query->paginate(10);
        $kategoris = DataResto::select('kategori')->distinct()->pluck('kategori');

        return view('admin.menus.index', compact('menus', 'kategoris', 'search', 'kategori'));
    }

    public function create()
    {
        $kategoris = DataResto::select('kategori')->distinct()->pluck('kategori');
        return view('admin.menus.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255|unique:data_resto,nama',
                'kategori' => 'required|string',
                'harga' => 'required|numeric|min:0',
                'keterangan' => 'required|string',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $menu = new DataResto();
            $menu->nama = $validated['nama'];
            $menu->kategori = $validated['kategori'];
            $menu->harga = $validated['harga'];
            $menu->keterangan = $validated['keterangan'];

            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = Str::slug($validated['nama']) . '.' . strtolower($file->getClientOriginalExtension());
                if (file_exists(public_path('assets/img/menu/' . $filename))) {
                    $filename = Str::slug($validated['nama']) . '-' . time() . '.' . strtolower($file->getClientOriginalExtension());
                }
                $file->move(public_path('assets/img/menu'), $filename);
                $menu->foto = $filename;
            }

            $menu->save();

            Log::info('Menu baru berhasil ditambahkan:', $menu->toArray());

            return redirect()->route('menus.index')->with('success', 'Menu baru berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Error menyimpan menu: ' . $e->getMessage());
            return redirect()->route('menus.index')->with('error', 'Terjadi kesalahan saat menyimpan menu: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $menu = DataResto::findOrFail($id);
        $kategoris = DataResto::select('kategori')->distinct()->pluck('kategori');

        return view('admin.menus.edit', compact('menu', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255|unique:data_resto,nama,' . $id,
                'kategori' => 'required|string',
                'harga' => 'required|numeric|min:0',
                'keterangan' => 'required|string',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $menu = DataResto::findOrFail($id);

            if ($request->hasFile('foto')) {
                // Hapus foto lama jika ada
                if ($menu->foto && file_exists(public_path('assets/img/menu/' . $menu->foto))) {
                    unlink(public_path('assets/img/menu/' . $menu->foto));
                    Log::info('Gambar lama dihapus: ' . $menu->foto);
                }

                // Simpan foto baru
                $file = $request->file('foto');
                $filename = Str::slug($validated['nama']) . '.' . strtolower($file->getClientOriginalExtension());
                if (file_exists(public_path('assets/img/menu/' . $filename))) {
                    $filename = Str::slug($validated['nama']) . '-' . time() . '.' . strtolower($file->getClientOriginalExtension());
                }
                $file->move(public_path('assets/img/menu'), $filename);
                $validated['foto'] = $filename;
                Log::info('Gambar baru disimpan: ' . $filename);
            }

            // Update data menu
            $menu->update($validated);

            Log::info('Menu berhasil diperbarui:', $menu->toArray());

            return redirect()->route('menus.index')->with('success', 'Menu berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Error memperbarui menu: ' . $e->getMessage());
            return redirect()->route('menus.index')->with('error', 'Terjadi kesalahan saat memperbarui menu: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $menu = DataResto::findOrFail($id);

            // Hapus foto jika ada
            if ($menu->foto && file_exists(public_path('assets/img/menu/' . $menu->foto))) {
                unlink(public_path('assets/img/menu/' . $menu->foto));
                Log::info('Gambar dihapus: ' . $menu->foto);
            }

            $menu->delete();

            Log::info('Menu berhasil dihapus:', ['id' => $id]);

            return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Error menghapus menu: ' . $e->getMessage());
            return redirect()->route('menus.index')->with('error', 'Terjadi kesalahan saat menghapus menu: ' . $e->getMessage());
        }
    }
}
