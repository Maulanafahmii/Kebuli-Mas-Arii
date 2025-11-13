<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DataResto;
use App\Models\Testimoni;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $menus = DataResto::latest()->take(10)->get();
        $testimonies = Testimoni::where('status', 'approved')->latest()->take(10)->get();
        return view('index', compact('menus', 'testimonies'));
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt(['email' => $credentials['username'], 'password' => $credentials['password']])) {
            return redirect()->intended('/admin/dashboard');
        }

        return redirect()->back()->withErrors(['username' => 'Invalid credentials'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    public function about()
    {
        return view('about');
    }

    public function menu()
    {
        // Karena frontend/menu.blade.php tidak ada, redirect ke index atau buat view baru
        $menus = DataResto::all();
        return view('index', compact('menus')); // Gunakan index.blade.php untuk menampilkan semua menu
        // Atau buat file frontend/menu.blade.php jika ingin halaman terpisah
    }

    public function testimoni()
    {
        $testimonies = Testimoni::latest()->take(10)->get();
        return view('testimoni', compact('testimonies'));
    }

    public function kontak()
    {
        return view('kontak');
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Logika simpan kontak ke database (misalnya, ke tabel contacts)
        Log::info('Kontak berhasil dikirim:', $request->all());

        return redirect()->back()->with('success', 'Kontak berhasil dikirim.');
    }

    public function storeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'menu_id' => 'required|exists:data_resto,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Simpan ke database (misalnya, ke tabel orders)
        Log::info('Order berhasil dikirim:', $request->all());

        return redirect()->back()->with('success', 'Order berhasil dikirim.');
    }

    public function storeTestimoni(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255',
                'pekerjaan' => 'required|string|max:255',
                'rating' => 'required|integer|min:1|max:5',
                'keterangan' => 'required|string',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $existing = Testimoni::where('nama', $request->nama)
                ->where('created_at', '>=', now()->subMinutes(5))
                ->exists();
            if ($existing) {
                return response()->json([
                    'success' => false,
                    'message' => 'Anda baru saja mengirimkan testimoni. Silakan coba lagi nanti.'
                ], 422);
            }

            $testimony = new Testimoni();
            $testimony->nama = $request->nama;
            $testimony->pekerjaan = $request->pekerjaan;
            $testimony->rating = $request->rating;
            $testimony->keterangan = $request->keterangan;
            $testimony->status = 'pending';

            if ($request->hasFile('foto')) {
                $filename = time() . '_' . $request->file('foto')->getClientOriginalName();
                $request->file('foto')->move(public_path('assets/img/testimonies'), $filename);
                $testimony->foto = $filename; // Simpan hanya nama file, bukan path lengkap
            }

            $testimony->save();

            Log::info('Testimoni disimpan dan menunggu persetujuan admin:', $testimony->toArray());

            return response()->json([
                'success' => true,
                'message' => 'Testimoni berhasil dikirim dan akan ditampilkan setelah disetujui oleh admin.'
            ], 201);
        } catch (\Exception $e) {
            Log::error('Error menyimpan testimoni: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan testimoni.'
            ], 500);
        }
    }

    public function storeMenu(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|string|max:255|unique:data_resto,nama',
                'harga' => 'required|numeric|min:0',
                'kategori' => 'required|string|max:255',
                'keterangan' => 'nullable|string',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $menu = new DataResto();
            $menu->nama = $request->nama;
            $menu->harga = $request->harga;
            $menu->kategori = $request->kategori;
            $menu->keterangan = $request->keterangan;

            if ($request->hasFile('foto')) {
                $filename = Str::slug($request->nama) . '.' . strtolower($request->file('foto')->getClientOriginalExtension());
                if (file_exists(public_path('assets/img/menu/' . $filename))) {
                    $filename = Str::slug($request->nama) . '-' . time() . '.' . strtolower($request->file('foto')->getClientOriginalExtension());
                }
                $request->file('foto')->move(public_path('assets/img/menu'), $filename);
                $menu->foto = $filename; // Simpan hanya nama file
            }

            $menu->save();

            Log::info('Menu berhasil disimpan:', $menu->toArray());

            return redirect()->back()->with('success', 'Menu berhasil ditambahkan.');
        } catch (\Exception $e) {
            Log::error('Error menyimpan menu: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan menu.');
        }
    }
}
