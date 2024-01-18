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
                @if(session('success'))
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
                                <h4 class="card-title">Edit Kategori <i>{{ $kategori->nama_kategori }}</i></h4>
                            </div>
                        </div>
                        <form action="{{ route('kategori.update', $kategori->id) }}" method="post">
                          @csrf
                          @method('PUT')
                          <div class="card-body">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="nama_kategori">Nama Kategori</label>
                                <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" value="{{ $kategori->nama_kategori }}" required>
                            </div>
                              <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" name="slug" id="slug" value="{{ $kategori->slug }}" required>
                            </div>
                            <div>
                              <div class="form-group">
                                <button class="btn btn-primary btn-sm" type="submit">
                                  <span class="btn-label">
                                    <i class="fa fa-bookmark"></i>
                                  </span>
                                  Simpan
                                </button>
                              </div>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
