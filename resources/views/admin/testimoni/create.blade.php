@extends('admin.layout.master')

@section('title', 'Tambah Testimoni - Nasi Kebuli')

@section('breadcrumb', 'Tambah Testimoni')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <h1>Tambah Testimoni</h1>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Testimoni</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/admin/testimoni') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    value="{{ old('nama') }}" required>
                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" name="pekerjaan" id="pekerjaan" class="form-control"
                                    value="{{ old('pekerjaan') }}" required>
                                @error('pekerjaan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="rating">Rating</label>
                                <input type="number" name="rating" id="rating" class="form-control" min="1"
                                    max="5" value="{{ old('rating') }}" required>
                                <small class="form-text text-muted">Masukkan rating antara 1-5</small>
                                @error('rating')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" class="form-control" required>{{ old('keterangan') }}</textarea>
                                @error('keterangan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto (Opsional)</label>
                                <input type="file" name="foto" class="form-control-file">
                                @error('foto')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="d-flex flex-wrap">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                <a href="{{ route('testimoni.index') }}" class="btn btn-secondary"><i
                                        class="fas fa-arrow-left"></i> Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
