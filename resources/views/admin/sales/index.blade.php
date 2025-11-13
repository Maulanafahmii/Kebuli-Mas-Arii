
@extends('admin.layout.master')

@section('title', 'Manajemen Penjualan - Nasi Kebuli')
@section('header', 'Manajemen Penjualan')
@section('breadcrumb', 'Penjualan')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Penjualan</h3>
                <a href="{{ route('sales.create') }}" class="btn btn-primary float-right">
                    <i class="fas fa-plus"></i> Tambah Penjualan
                </a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Form Pencarian -->
                <form method="GET" action="{{ route('sales.index') }}" class="mb-3">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan cabang..." value="{{ $search ?? '' }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered">
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
                            @forelse ($sales as $sale)
                                <tr>
                                    <td>{{ $sale->branch_name }}</td>
                                    <td>{{ $sale->sale_date }}</td>
                                    <td>Rp {{ number_format($sale->total_sales, 0, ',', '.') }}</td>
                                    <td>{{ $sale->notes ?? '-' }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data penjualan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- Tambahkan pengecekan sebelum links -->
                    @if (isset($sales) && $sales instanceof \Illuminate\Pagination\LengthAwarePaginator)
                        {{ $sales->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        /* Responsivitas */
        @media (max-width: 767.98px) {
            .col-md-12 {
                flex: 0 0 100%;
                max-width: 100%;
            }
            .col-md-4, .col-md-3 {
                flex: 0 0 100%;
                max-width: 100%;
                margin-bottom: 10px;
            }
            .table-responsive {
                overflow-x: auto;
            }
        }
    </style>
@endsection

@section('scripts')
    <script>
        // Fungsi tambahan jika diperlukan
    </script>
@endsection
