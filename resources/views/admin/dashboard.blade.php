@extends('admin.layout.master')

@section('title', 'Admin Dashboard - Nasi Kebuli')
@section('header', 'Dashboard')
@section('breadcrumb', 'Dashboard')
    <link href="{{ asset('assets/img/logo.png') }}" rel="icon">

@section('content')
    <div class="row">
        <!-- Small Box: Total Penjualan Hari Ini -->
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="small-box bg-info shadow-sm">
                <div class="inner text-center py-3">
                    <h4 class="mb-0"><i class="fas fa-home mr-2"></i> Dashboard</h4>
                    <h3 class="mt-1">{{ number_format($todaySales, 0, ',', '.') }}</h3>
                    <p class="mb-0">Total Penjualan Hari Ini</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer" onclick="window.location.href='{{ route('sales.index') }}'">
                    Lihat Semua <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- Small Box: Jumlah Menu -->
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="small-box bg-success shadow-sm">
                <div class="inner text-center py-3">
                    <h4 class="mb-0"><i class="fas fa-utensils mr-2"></i> Menu</h4>
                    <h3 class="mt-1">{{ $menuCount }}</h3>
                    <p class="mb-0">Jumlah Menu</p>
                </div>
                <div class="icon">
                    <i class="fas fa-utensils"></i>
                </div>
                <a href="{{ route('menus.index') }}" class="small-box-footer">
                    Lihat Semua <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- Small Box: Testimoni -->
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="small-box bg-warning shadow-sm">
                <div class="inner text-center py-3">
                    <h4 class="mb-0"><i class="fas fa-comment mr-2"></i> Testimoni</h4>
                    <h3 class="mt-1">{{ $testimoniCount }}</h3>
                    <p class="mb-0">Testimoni</p>
                </div>
                <div class="icon">
                    <i class="fas fa-comment"></i>
                </div>
                <a href="{{ route('testimoni.index') }}" class="small-box-footer">
                    Lihat Semua <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Penjualan Harian per Cabang</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" title="Refresh" onclick="refreshData('sales')">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Cabang</th>
                                    <th>Tanggal</th>
                                    <th>Total Penjualan</th>
                                    <th>Catatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $sale)
                                    <tr>
                                        <td>{{ $sale->branch_name }}</td>
                                        <td>{{ $sale->sale_date }}</td>
                                        <td>Rp {{ number_format($sale->total_sales, 0, ',', '.') }}</td>
                                        <td>{{ $sale->notes ?? '-' }}</td>
                                        <td>
                                            <a href="{{ route('sales.index', $sale->id) }}" class="btn btn-sm btn-info" title="Detail">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        /* Styling Kotak Statistik */
        .small-box {
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 150px; /* Ukuran kotak lebih kecil */
        }
        .small-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .small-box .inner {
            padding: 10px;
        }
        .small-box h4 {
            font-size: 14px;
            color: #fff;
        }
        .small-box h3 {
            font-size: 24px;
            margin-bottom: 0;
            color: #fff;
        }
        .small-box p {
            font-size: 14px;
            color: #fff;
        }
        .small-box-footer {
            padding: 5px 10px;
            font-size: 12px;
            background: rgba(0, 0, 0, 0.1);
            color: #fff;
            text-align: center;
        }
        .small-box-footer:hover {
            background: rgba(0, 0, 0, 0.2);
            text-decoration: none;
        }

        /* Responsivitas */
        @media (max-width: 767.98px) {
            .col-lg-4, .col-md-6, .col-sm-6 {
                flex: 0 0 100%;
                max-width: 100%;
                margin-bottom: 15px;
            }
            .small-box {
                height: auto;
            }
            .table-responsive {
                overflow-x: auto;
            }
        }

        /* Styling Tabel */
        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }
    </style>
@endsection

@section('scripts')
    <script>
        function refreshData(section) {
            alert(`Mengambil data terbaru untuk ${section}...`);
        }

        function showDetail(id) {
            alert(`Menampilkan detail untuk ${id}...`);
        }
    </script>
@endsection
