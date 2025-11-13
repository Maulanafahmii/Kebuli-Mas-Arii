@extends('admin.layout.master')

@section('title', 'Edit Testimoni - Nasi Kebuli')

@section('breadcrumb', 'Edit Testimoni')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <h1>Edit Testimoni</h1>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Testimoni</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('testimoni.update', $testimoni->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    value="{{ old('nama', $testimoni->nama) }}" required>
                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" name="pekerjaan" id="pekerjaan" class="form-control"
                                    value="{{ old('pekerjaan', $testimoni->pekerjaan) }}" required>
                                @error('pekerjaan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="rating">Rating</label>
                                <input type="number" name="rating" id="rating" class="form-control" min="1"
                                    max="5" value="{{ old('rating', $testimoni->rating) }}" required>
                                <small class="form-text text-muted">Masukkan rating antara 1-5</small>
                                @error('rating')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" class="form-control" required>{{ old('keterangan', $testimoni->keterangan) }}</textarea>
                                @error('keterangan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto Baru (Opsional)</label>
                                <input type="file" name="foto" class="form-control-file">
                                @error('foto')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                @if ($testimoni->foto)
                                    <div class="mt-2">
                                        <p>Foto Saat Ini:</p>
                                        <img src="{{ $testimoni->gambar_url }}" alt="Foto Testimoni" class="img-thumbnail"
                                            width="120">
                                    </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            <a href="{{ route('testimoni.index') }}" class="btn btn-secondary"><i
                                    class="fas fa-arrow-left"></i> Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
