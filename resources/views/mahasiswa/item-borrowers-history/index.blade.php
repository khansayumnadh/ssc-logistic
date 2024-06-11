@extends('layouts.stisla.index', ['title' => 'Histori Peminjaman Barang', 'section_header' => 'Histori Peminjaman Barang'])

@section('content')
<div class="row">
  <div class="col-lg-12 table-responsive">
    <div class="card px-3 py-3">
      <div class="row">
        <div class="col-lg-12 px-3 py-3 text-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#item-borrowers-history-create-modal">
            Tambah Peminjaman
          </button>
        </div>
      </div>
      <table class="table table-hovered text-center table-bordered" id="datatable">
        <thead>
          <tr>
            <th>#</th>
            <th>Barang</th>
            <th>Status</th>
            <th>Dikonfirmasi Pada</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($my_items as $my_item)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $my_item->item->title }}</td>
            @if($my_item->status === 1)
            <td class="badge badge-pill badge-success shadow-sm my-2" data-toggle="tooltip" data-placement="top" title="Disetujui">Disetujui</td>
            @elseif($my_item->status === 2)
            <td class="badge badge-pill badge-warning shadow-sm my-2" data-toggle="tooltip" data-placement="top" title="Menunggu">Menunggu</td>
            @else
            <td class="badge badge-pill badge-danger shadow-sm my-2" data-toggle="tooltip" data-placement="top" title="Tidak Disetujui">Tidak Disetujui</td>
            @endif
            <td>{{ $my_item->updated_at !== NULL ? $my_item->updated_at : '-' }}</td>
            <td>
              <a href="{{ route('mahasiswa.item-borrowers-history.show', $my_item->id) }}" data-id="{{ $my_item->id }}" class="btn btn-sm btn-info swal-show">
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
@include('mahasiswa.item-borrowers-history.modal.create')
@endpush

@push('js')
@include('mahasiswa.item-borrowers-history._script')
@endpush