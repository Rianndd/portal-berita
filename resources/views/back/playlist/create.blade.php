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
                                <h4 class="card-title">Tambah Playlist</h4>
                                <a href="{{ route('playlist.index') }}" class="btn btn-warning btn-round btn-sm ml-auto">
                                    <i class="fas fa-chevron-left"></i>
                                    Back
                                </a>
                            </div>
                        </div>
                        <form action="{{ route('playlist.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="judul">Judul Playlist Video</label>
                                    <input type="text" class="form-control" name="judul_playlist"
                                        placeholder="Masukkan Judul Playlist" required>
                                </div>
                                <div class="form-group">
                                    <label for="body">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" id="editor"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="gambar_artikel">Gambar Playlist</label>
                                    <input type="file" class="form-control" name="gambar_playlist" id="gambar_artikel">
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
