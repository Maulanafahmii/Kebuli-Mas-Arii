<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sale; // Import model Sale
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Sale::query();
        if ($search) {
            $query->where('branch_name', 'LIKE', "%{$search}%");
        }
        $sales = $query->get();
        return view('admin.sales.index', compact('sales', 'search'));
    }

    public function create()
    {
        return view('admin.sales.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'branch_name' => 'required|string|max:255',
            'sale_date' => 'required|date',
            'total_sales' => 'required|numeric',
            'notes' => 'nullable|string',
        ]);

        Sale::create($request->all());
        return redirect()->route('sales.index')->with('success', 'Penjualan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $sale = Sale::findOrFail($id);
        return view('admin.sales.edit', compact('sale'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'branch_name' => 'required|string|max:255',
            'sale_date' => 'required|date',
            'total_sales' => 'required|numeric',
            'notes' => 'nullable|string',
        ]);

        $sale = Sale::findOrFail($id);
        $sale->update($request->all());
        return redirect()->route('sales.index')->with('success', 'Penjualan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Penjualan berhasil dihapus.');
    }
}
