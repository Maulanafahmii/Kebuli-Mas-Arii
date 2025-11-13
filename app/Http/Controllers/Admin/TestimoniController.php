<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class TestimoniController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Testimoni::query();

        if ($search) {
            $query->where('nama', 'LIKE', "%{$search}%");
        }

        $testimonies = $query->latest()->paginate(10);
        return view('admin.testimoni.index', compact('testimonies', 'search'));
    }

    public function create()
    {
        return view('admin.testimoni.create');
    }


public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'pekerjaan' => 'required|string|max:255',
        'rating' => 'required|integer|min:1|max:5',
        'keterangan' => 'required|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $testimoni = new Testimoni();
    $testimoni->nama = $request->nama;
    $testimoni->pekerjaan = $request->pekerjaan;
    $testimoni->rating = $request->rating;
    $testimoni->keterangan = $request->keterangan;

    if ($request->hasFile('foto')) {
        $filename = time().'_'.$request->file('foto')->getClientOriginalName();
        $request->file('foto')->move(public_path('assets/img/testimonies'), $filename);
        $testimoni->foto = 'assets/img/testimonies/' . $filename;
    }
$testimoni->status = 'pending';
    $testimoni->save();

    return back()->with('success', 'Testimoni Anda berhasil dikirim dan akan ditinjau oleh admin.');
}


    public function edit($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        return view('admin.testimoni.edit', compact('testimoni'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'pekerjaan' => 'required|string|max:255',
                'rating' => 'required|integer|min:1|max:5',
                'keterangan' => 'required|string',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $testimoni = Testimoni::findOrFail($id);
            $data = $request->all();

            if ($request->hasFile('foto')) {
                if ($testimoni->foto) {
                    Storage::disk('public')->delete($testimoni->foto);
                }
                $filename = time() . '_' . $request->file('foto')->getClientOriginalName();
                $request->file('foto')->storeAs('assets/testimonies', $filename, 'public');
                $data['foto'] = 'assets/testimonies/' . $filename;
            }

            $testimoni->update($data);
            Log::info('Testimoni diperbarui:', $testimoni->toArray());

            return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil diperbarui.');
        } catch (\Exception $e) {
            Log::error('Error updating testimoni: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    public function destroy($id)
    {
        try {
            $testimoni = Testimoni::findOrFail($id);

            if ($testimoni->foto) {
                Storage::disk('public')->delete($testimoni->foto);
            }

            $testimoni->delete();
            Log::info('Testimoni dihapus:', ['id' => $id]);

            return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Error deleting testimoni: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }
    public function approve($id)
{
    try {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni->status = 'approved';
        $testimoni->save();

        Log::info('Testimoni disetujui:', ['id' => $id]);

        return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil disetujui.');
    } catch (\Exception $e) {
        Log::error('Error approving testimoni: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Terjadi kesalahan saat menyetujui testimoni.');
    }
}

}
