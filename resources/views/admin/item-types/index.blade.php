@extends('layouts.stisla.index', ['title' => 'Daftar Kategori Barang', 'section_header' => 'Daftar Kategori Barang'])

@section('content')
<div class="row">
  <div class="col-lg-12 table-responsive">
    @include('layouts.utilities.flash-message')
    <div class="card px-3 py-3">
      <div class="row">
        <div class="col-lg-12 px-3 py-3 text-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#item-types-create-modal">
            Tambah Kategori Barang
          </button>
        </div>
      </div>
      <table class="table table-hovered text-center table-bordered" id="datatable">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($item_types as $item_type)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td class="item-types-name-index">{{ $item_type->name }}</td>
            <td>{{ $item_type->description }}</td>
            <td class="btn-group" role="group">
              <button type="submit" data-toggle="modal" data-target="#item-types-show-modal"
                data-id="{{ $item_type->id }}" class="btn btn-sm btn-info item-types-swal-show-button">
                <i class="fas fa-info-circle"></i>
              </button>
              <button type="submit" data-toggle="modal" data-target="#item-types-edit-modal"
                data-id="{{ $item_type->id }}" class="btn btn-sm btn-success item-types-swal-edit-button">
                <i class="fas fa-edit"></i>
              </button>
              <form action="{{ route('admin.item-types.destroy', $item_type->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-sm btn-danger item-types-swal-delete-button">
                  <i class="fas fa-trash-alt"></i>
                </button>
              </form>
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
@include('admin.item-types.modal.create')
@include('admin.item-types.modal.show')
@include('admin.item-types.modal.edit')
@endpush

@push('js')
@include('admin.item-types._script')
@endpush