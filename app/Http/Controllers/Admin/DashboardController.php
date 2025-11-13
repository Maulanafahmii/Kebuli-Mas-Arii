<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sale; // Import model Sale
use App\Models\DataResto; // Import model DataResto
use App\Models\Testimoni; // Import model Testimoni
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $todaySales = Sale::whereDate('sale_date', today())->sum('total_sales'); // Perbaikan dari Sales ke Sale
        $menuCount = DataResto::count();
        $testimoniCount = Testimoni::count();
        $sales = Sale::latest()->take(10)->get(); // Perbaikan dari Sales ke Sale

        return view('admin.dashboard', compact('todaySales', 'menuCount', 'testimoniCount', 'sales'));
    }

}
