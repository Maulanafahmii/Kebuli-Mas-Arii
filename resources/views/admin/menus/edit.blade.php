@extends('admin.layout.master')

@section('title', 'Edit Menu - Nasi Kebuli')

@section('breadcrumb', 'Edit Menu')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <h1>Edit Menu</h1>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Menu</h3>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama">Nama Menu</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    value="{{ old('nama', $menu->nama) }}" required>
                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori }}"
                                            {{ old('kategori', $menu->kategori) == $kategori ? 'selected' : '' }}>
                                            {{ $kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kategori')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" id="harga" class="form-control"
                                    value="{{ old('harga', $menu->harga) }}" step="0.01" required>
                                @error('harga')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" class="form-control">{{ old('keterangan', $menu->keterangan) }}</textarea>
                                @error('keterangan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto Menu</label>
                                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                                @error('foto')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                @if ($menu->foto && file_exists(public_path('assets/img/menu/' . $menu->foto)))
                                    <img src="{{ asset('assets/img/menu/' . $menu->foto . '?v=' . time()) }}"
                                        alt="{{ $menu->nama }}" class="img-fluid mt-2" style="max-width: 100px;">
                                @else
                                    <img src="{{ asset('assets/img/default-menu.jpg') }}" alt="Default Image"
                                        class="img-fluid mt-2" style="max-width: 100px;">
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            <a href="{{ route('menus.index') }}" class="btn btn-secondary"><i
                                    class="fas fa-arrow-left"></i>
                                Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
