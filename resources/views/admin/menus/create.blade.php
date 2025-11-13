@extends('admin.layout.master')

@section('title', 'Add Menu - Nasi Kebuli')

@section('breadcrumb', 'Add Menu')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <h1>Tambah Menu</h1>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Menu</h3>
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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Menu</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    value="{{ old('nama') }}" required>
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
                                            {{ old('kategori') == $kategori ? 'selected' : '' }}>
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
                                    value="{{ old('harga') }}" step="0.01" required>
                                @error('harga')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
                                @error('keterangan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto Menu</label>
                                <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                                @error('foto')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-flex flex-wrap">
                                <button type="submit" class="btn btn-primary mr-2"><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{ route('menus.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
