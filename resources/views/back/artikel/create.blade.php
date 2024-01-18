@extends('layouts.default')
@section('content')
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">

            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%;">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card full-height">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tambah Artikel</h4>
                                <a href="{{ route('artikel.index') }}" class="btn btn-warning btn-round btn-sm ml-auto">
                                    <i class="fas fa-chevron-left"></i>
                                    Back
                                </a>
                            </div>
                        </div>
                        <form action="{{ route('artikel.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="judul">Judul Artikel</label>
                                    <input type="text" class="form-control" name="judul" id="judul"
                                        placeholder="Masukkan Judul Artikel" required>
                                </div>
                                <div class="form-group">
                                    <label for="body">Body</label>
                                    <textarea class="form-control" name="body" id="body" placeholder="Masukkan Deskripsi Artikel" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control" name="kategori_id" id="kategori">
                                        <option value=""><<-- Pilih Kategori -->></option>
                                        @foreach ($kategori as $row)
                                            <option value="{{ $row->id }}">{{ $row->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gambar_artikel">Gambar Artikel</label>
                                    <input type="file" class="form-control" name="gambar_artikel" id="gambar_artikel">
                                </div>
                                <div class="form-group">
                                    <label for="is_active">Status</label>
                                    <select class="form-control" name="is_active" id="is_active">
                                        <option value=""><<-- Pilih Status -->></option>
                                        <option value="1">Publish</option>
                                        <option value="0">Draft</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-warning btn-sm">Reset</button>
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
