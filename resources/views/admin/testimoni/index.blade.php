@extends('admin.layout.master')

@section('title', 'Manajemen Testimoni - Nasi Kebuli')
@section('header', 'Manajemen Testimoni')
@section('breadcrumb', 'Testimoni')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Testimoni</h3>
            <a href="{{ route('testimoni.create') }}" class="btn btn-primary float-right">
                <i class="fas fa-plus"></i> Tambah Testimoni
            </a>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Form Pencarian -->
            <form method="GET" action="{{ route('testimoni.index') }}" class="mb-3">
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
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Rating</th>
                            <th>Keterangan</th>
                            <th>Foto</th>
                            <th>Pekerjaan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($testimonies as $testimoni)
                            <tr>
                                <td>{{ $testimoni->nama }}</td>
                                <td>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="bi bi-star{{ $i <= $testimoni->rating ? '-fill' : '' }}" style="color: #ffc107;"></i>
                                    @endfor
                                </td>
                                <td>{{ Str::limit($testimoni->keterangan, 50) }}</td>
                                <td>
                                    <img src="{{ $testimoni->gambar_url }}" alt="{{ $testimoni->nama }}"
                                        class="img-fluid rounded" style="max-width: 100px;">
                                </td>
                                <td>{{ $testimoni->pekerjaan }}</td>
                                <td>
                                    <span class="badge badge-{{ $testimoni->status === 'approved' ? 'success' : 'warning' }}">
                                        {{ ucfirst($testimoni->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex flex-wrap gap-1">
                                        <a href="{{ route('testimoni.edit', $testimoni->id) }}"
                                            class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('testimoni.destroy', $testimoni->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus"
                                                onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        @if($testimoni->status === 'pending')
                                            <form action="{{ route('testimoni.approve', $testimoni->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-success" title="Setujui">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data testimoni.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Paginasi -->
                @if ($testimonies->hasPages())
                    {{ $testimonies->onEachSide(1)->links('pagination::bootstrap-4') }}
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

        .col-md-4 {
            flex: 0 0 100%;
            max-width: 100%;
            margin-bottom: 10px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        img {
            max-height: 80px;
            object-fit: cover;
        }
    }

    .bi-star-fill {
        color: #ffc107;
    }

    .gap-1 > * {
        margin-right: 5px;
        margin-bottom: 5px;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endsection
