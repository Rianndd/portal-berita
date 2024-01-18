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
                                <h4 class="card-title">Data Playlist</h4>
                                <a href="{{ route('playlist.create') }}" class="btn btn-primary btn-round btn-sm ml-auto">
                                    <i class="fa fa-plus"></i>
                                    Tambah Playlist
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_length" id="add-row_length"><label>Show <select
                                                        name="add-row_length" aria-controls="add-row"
                                                        class="form-control form-control-sm">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select> entries</label></div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div id="add-row_filter" class="dataTables_filter"><label>Search:<input
                                                        type="search" class="form-control form-control-sm" placeholder=""
                                                        aria-controls="add-row"></label></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="add-row" class="display table table-striped table-hover dataTable"
                                                role="grid" aria-describedby="add-row_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th style="width: 126.281px;" class="sorting" tabindex="0"
                                                            aria-controls="add-row" rowspan="1" colspan="1"
                                                            aria-label="Action: activate to sort column ascending">No
                                                        </th>
                                                        <th class="sorting_asc" tabindex="0" aria-controls="add-row"
                                                            rowspan="1" colspan="1" aria-sort="ascending"
                                                            aria-label="Nama: activate to sort column descending"
                                                            style="width: 193.891px;">Playlist Video</th>
                                                        <th class="sorting" tabindex="0" aria-controls="add-row"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Slug: activate to sort column ascending"
                                                            style="width: 283.703px;">Slug</th>
                                                        <th class="sorting" tabindex="0" aria-controls="add-row"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Slug: activate to sort column ascending"
                                                            style="width: 283.703px;">Author</th>
                                                        <th class="sorting" tabindex="0" aria-controls="add-row"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Slug: activate to sort column ascending"
                                                            style="width: 283.703px;">Status</th>
                                                        <th class="sorting" tabindex="0" aria-controls="add-row"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Slug: activate to sort column ascending"
                                                            style="width: 283.703px;">Gambar</th>
                                                        <th style="width: 126.281px;" class="sorting" tabindex="0"
                                                            aria-controls="add-row" rowspan="1" colspan="1"
                                                            aria-label="Action: activate to sort column ascending">Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($playlist as $key => $row)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $row->judul_playlist }}</td>
                                                            <td>{{ $row->slug }}</td>
                                                            <td>{{ $row->users->name }}</td>
                                                            <td>
                                                                @if ($row->is_active == '1')
                                                                    Active
                                                                @else
                                                                    Draft
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <img src="{{ asset('uploads/' . $row->gambar_playlist) }}"
                                                                        alt="{{ $row->judul }}"
                                                                        style="max-width: 100px; max-height: 100px;">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-button-action">
                                                                    <a href="{{ route('playlist.edit', $row->id) }}"
                                                                        type="button" data-toggle="tooltip"
                                                                        title=""
                                                                        class="btn btn-link btn-primary btn-lg"
                                                                        data-original-title="Edit playlist">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <form
                                                                        action="{{ route('playlist.destroy', $row->id) }}"
                                                                        method="post" onsubmit="return confirmDelete()">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit" data-toggle="tooltip"
                                                                            title="" class="btn btn-link btn-danger"
                                                                            data-original-title="Delete playlist">
                                                                            <i class="fa fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td class="text-center bg-warning font-weight-bold"
                                                                style="font-size: 20px" colspan="7">Data masih kosong
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <div class="dataTables_info" id="add-row_info" role="status"
                                                aria-live="polite">Showing 1 to 5 of 10 entries</div>
                                        </div>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="dataTables_paginate paging_simple_numbers" id="add-row_paginate">
                                                <ul class="pagination">
                                                    <li class="paginate_button page-item previous disabled"
                                                        id="add-row_previous"><a href="#" aria-controls="add-row"
                                                            data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                                    </li>
                                                    <li class="paginate_button page-item active"><a href="#"
                                                            aria-controls="add-row" data-dt-idx="1" tabindex="0"
                                                            class="page-link">1</a></li>
                                                    <li class="paginate_button page-item "><a href="#"
                                                            aria-controls="add-row" data-dt-idx="2" tabindex="0"
                                                            class="page-link">2</a></li>
                                                    <li class="paginate_button page-item next" id="add-row_next"><a
                                                            href="#" aria-controls="add-row" data-dt-idx="3"
                                                            tabindex="0" class="page-link">Next</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus kategori ini?');
    }
</script>
