@extends('admin.layout.master')

@section('title', 'Manajemen Menu - Nasi Kebuli')
@section('header', 'Manajemen Menu')
@section('breadcrumb', 'Menu')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Menu</h3>
                <a href="{{ route('menus.create') }}" class="btn btn-primary float-right">
                    <i class="fas fa-plus"></i> Tambah Menu
                </a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Form Pencarian dan Filter Kategori -->
                <form method="GET" action="{{ route('menus.index') }}" class="mb-3">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Cari berdasarkan nama..." value="{{ $search ?? '' }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <select name="kategori" class="form-control" onchange="this.form.submit()">
                                <option value="all">Semua Kategori</option>
                                @foreach ($kategoris as $kat)
                                    <option value="{{ $kat }}" {{ ($kategori ?? '') == $kat ? 'selected' : '' }}>
                                        {{ $kat }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Keterangan</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @use('Illuminate\Support\Str')
                            @forelse ($menus as $menu)
                                <tr>
                                    <td>{{ $menu->nama }}</td>
                                    <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                                    <td>{{ Str::limit($menu->keterangan, 50) }}</td>
                                    <td>
                                        @if ($menu->foto && file_exists(public_path('assets/img/menu/' . $menu->foto)))
                                            <img src="{{ asset('assets/img/menu/' . $menu->foto . '?v=' . time()) }}"
                                                alt="{{ $menu->nama }}" class="menu-image img-fluid rounded"
                                                style="max-width: 100px;">
                                        @else
                                            <img src="{{ asset('assets/img/default-menu.jpg') }}" alt="Default Image"
                                                class="menu-image img-fluid rounded" style="max-width: 100px;">
                                        @endif
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-sm btn-warning"
                                                title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('menus.destroy', $menu->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus"
                                                    onclick="return confirm('Yakin ingin menghapus?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data menu.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    @if (isset($menus) && $menus->hasPages())
                        {{ $menus->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        @media (max-width: 767.98px) {
            .col-md-12 {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .col-md-4,
            .col-md-3 {
                flex: 0 0 100%;
                max-width: 100%;
                margin-bottom: 10px;
            }

            .table-responsive {
                overflow-x: auto;
            }

            .menu-image {
                max-height: 80px;
                object-fit: cover;
            }
        }
    </style>
@endsection

@section('scripts')
    <script>
        // Fungsi tambahan jika diperlukan
    </script>
@endsection
