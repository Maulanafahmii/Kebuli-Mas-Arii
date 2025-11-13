@extends('admin.layout.master')

@section('title', 'Edit Penjualan - Nasi Kebuli')

@section('breadcrumb', 'Edit Penjualan')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Edit Penjualan</h1>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Penjualan</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('sales.update', $sale->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="branch_name">Nama Cabang</label>
                            <input type="text" name="branch_name" id="branch_name" class="form-control" value="{{ old('branch_name', $sale->branch_name) }}" required>
                            @error('branch_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sale_date">Tanggal Penjualan</label>
                            <input type="date" name="sale_date" id="sale_date" class="form-control" value="{{ old('sale_date', $sale->sale_date) }}" required>
                            @error('sale_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="total_sales">Total Penjualan</label>
                            <input type="number" name="total_sales" id="total_sales" class="form-control" value="{{ old('total_sales', $sale->total_sales) }}" step="0.01" required>
                            @error('total_sales')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="notes">Catatan</label>
                            <textarea name="notes" id="notes" class="form-control">{{ old('notes', $sale->notes) }}</textarea>
                            @error('notes')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        <a href="{{ route('menus.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
