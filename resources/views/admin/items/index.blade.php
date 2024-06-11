@extends('layouts.stisla.index', ['title' => 'Daftar Barang', 'section_header' => 'Daftar Barang'])

@section('content')
<div class="row">
  <div class="col-lg-12 table-responsive">
    <div class="card px-3 py-3">
      <div class="row">
        <div class="col-lg-12 px-3 py-3 text-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-item-modal">
            Tambah Barang
          </button>
        </div>
      </div>
      <table class="table table-hovered text-center table-bordered" id="datatable">
        <thead>
          <tr>
            <th>#</th>
            <th>Nomor Barang</th>
            <th>Nama Barang</th>
            <th>Lokasi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->item_number }}</td>
            <td>{{ Str::limit($item->title, 40, '...') }}</td>
            <td>{{ $item->location }}</td>
            <td>
              <a href="{{ route('admin.items.show', $item->id) }}" data-id="{{ $item->id }}" class="btn btn-sm btn-info swal-show-a">
                <i class="fas fa-info-circle"></i>
              </a>
              <button type="submit" data-id="{{ $item->id }}" class="btn btn-sm btn-danger swal-delete-button">
                <i class="fas fa-trash-alt"></i>
              </button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@push('modal')
@include('admin.items.modal.create')
@endpush

@push('js')
@include('admin.items._script')
@endpush