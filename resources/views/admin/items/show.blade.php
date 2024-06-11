@extends('layouts.stisla.index', ['title' => 'Detail Barang ' . $item->title, 'section_header' => 'Detail Barang ' . $item->title])

@section('content')
<div class="row">
  <div class="col-lg-7">
    <div class="card">
      <table class="table">
        <tr>
          <td style="width: 145px;">Nama Barang</td>
          <td style="width: 10px;">:</td>
          <td class="text-wrap">{{ $item->title }}</td>
        </tr>
        <tr>
          <td>Nomor Barang</td>
          <td>:</td>
          <td class="text-wrap">{{ $item->item_number }}</td>
        </tr>
        <tr>
          <td>Lokasi</td>
          <td>:</td>
          <td class="text-wrap">{{ $item->location }}</td>
        </tr>
        <tr>
          <td>Tipe Barang</td>
          <td>:</td>
          <td class="text-wrap">{{ $item->item_type->name }}</td>
        </tr>
        <!-- <tr>
          <td>Bahasa</td>
          <td>:</td>
          <td class="text-wrap">{{ $item->languages }}</td>
        </tr> -->
        <tr>
          <td>Ditambahkan Pada</td>
          <td>:</td>
          <td class="text-wrap">{{ date_format(date_create($item->indonesian_date), 'd-m-Y') }}</td>
        </tr>
      </table>
    </div>
  </div>

  <div class="col-lg-5">
    <div class="card">
      <img src="{{ asset($item->image) }}" class="img-thumbnail" alt="{{ $item->title }}">
    </div>
    <div class="py-4">
      <a href="{{ route('admin.items.index') }}" class="btn btn-primary">Kembali</a>
      <a href="{{ route('admin.items.edit', $item->id) }}" data-id="{{ $item->id }}" class="btn btn-success">Ubah</a>
    </div>

  </div>
</div>
@endsection