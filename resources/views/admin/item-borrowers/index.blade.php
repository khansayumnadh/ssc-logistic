@extends('layouts.stisla.index', ['title' => 'Daftar Peminjam Barang', 'section_header' => 'Daftar Peminjam Barang'])

@section('content')
<div class="row">
  <div class="col-lg-12 table-responsive">
    <div class="card px-3 py-3">
      <div class="row">
        <div class="col-lg-12 px-3 py-3 text-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-item-borrower-modal">
            Tambah Data Peminjam Barang
          </button>
        </div>
      </div>
      <table class="table table-hovered text-center table-bordered" id="datatable">
        <thead>
          <tr>
            <th>#</th>
            <th>Peminjam</th>
            <th>Barang</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($item_users as $item_user)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item_user->user->name }}</td>
            <td>{{ Str::limit($item_user->item->title, 40, '...') }}</td>
            <td>{{ date_format(date_create($item_user->date_start), 'd-m-Y') }}</td>
            <td>{{ date_format(date_create($item_user->date_end), 'd-m-Y') }}</td>
            <td>
              <a href="{{ route('admin.item-borrowers.show', $item_user->id) }}" data-id="{{ $item_user->id }}" class="btn btn-sm btn-info swal-show-a">
                <i class="fas fa-info-circle"></i>
              </a>
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
@include('admin.item-borrowers.modal.item.create')
@endpush

@push('js')
@include('admin.item-borrowers._script')
@endpush