<?php

namespace App\Http\Controllers;

use App\Models\DataResto;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:15',
                'address' => 'required|string',
                'menu_id' => 'required|exists:data_resto,id',
                'quantity' => 'required|integer|min:1',
            ]);

            // Ambil menu dari DataResto
            $menu = DataResto::findOrFail($validated['menu_id']);

            // Simpan ke database
            $order = new Order();
            $order->name = $validated['name'];
            $order->email = $validated['email'];
            $order->phone = $validated['phone'];
            $order->address = $validated['address'];
            $order->menu_id = $validated['menu_id'];
            $order->quantity = $validated['quantity'];
            $order->total_price = $menu->harga * $validated['quantity'];
            $order->save();

            // Format isi email
            $emailBody = "Pesanan Baru Telah Diterima:\n\n" .
                "Nama Pelanggan : {$validated['name']}\n" .
                "Email          : {$validated['email']}\n" .
                "No. Telepon    : {$validated['phone']}\n" .
                "Alamat         : {$validated['address']}\n" .
                "Menu           : {$menu->nama}\n" .
                "Jumlah         : {$validated['quantity']}\n" .
                "Total Harga    : Rp " . number_format($order->total_price, 0, ',', '.') . "\n";

            // Kirim email
            Mail::raw($emailBody, function ($message) use ($validated) {
                $message->to('maulanafahmii916@gmail.com')
                    ->subject('Pesanan Baru dari ' . $validated['name']);
            });

            Log::info('Pesanan berhasil disimpan:', $order->toArray());

            // Kembali ke halaman dengan notifikasi
            return redirect()->back()->with('sent-message', 'Pesanan Anda telah diterima dan dikirim ke email!');
        } catch (\Exception $e) {
            Log::error('Error menyimpan pesanan: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan pesanan: ' . $e->getMessage());
        }
    }
}
