@extends('layouts.stisla.index', ['title' => 'Detail Barang ' . $item->title, 'section_header' => 'Detail Barang ' . $item->title])

@section('content')
<div class="row">
  <div class="col-lg-7">
    <div class="card">
      <form action="{{ route('admin.items.update', $item->id) }}" method="POST" enctype="multipart/form-data" id="form_item_update">
        @method('PUT')
        @csrf
        <table class="table">
          <tr>
            <td style="width: 145px;">Nama Barang</td>
            <td style="width: 10px;">:</td>
            <td class="text-wrap">
              <input type="text" class="form-control" name="title" id="title_edit" value="{{ $item->title }}">
            </td>
          </tr>
          <tr>
            <td>Nomor Barang</td>
            <td>:</td>
            <td class="text-wrap">
              <input type="text" class="form-control" name="item_number" id="item_number_edit" value="{{ $item->item_number }}">
            </td>
          </tr>
          <tr>
            <td>Lokasi</td>
            <td>:</td>
            <td class="text-wrap">
              <input type="text" class="form-control" name="location" id="location_edit" value="{{ $item->location }}">
            </td>
          </tr>
          <tr>
            <td>Kategori Barang</td>
            <td>:</td>
            <td class="text-wrap">
              <select class="form-control" name="item_type_id" id="item_type_id_edit">
                @foreach($item_types as $item_type)
                <option value="{{ $item_type->id }}">{{ $item_type->name }}</option>
                @endforeach
              </select>
            </td>
          </tr>
          <!-- <tr>
            <td>Bahasa</td>
            <td>:</td>
            <td class="text-wrap">
              <input type="text" class="form-control" name="languages" id="languages_edit" value="{{ $item->languages }}">
            </td>
          </tr> -->
          <tr>
            <td>Ditambahkan Pada</td>
            <td>:</td>
            <td class="text-wrap">
              <input type="date" class="form-control" name="date_of_added" id="date_of_added_edit" value="{{ $item->date_of_added }}">
            </td>
          </tr>
        </table>
    </div>
  </div>

  <div class="col-lg-5">
    <div class="card">
      <img src="{{ asset($item->image) }}" class="img-thumbnail" alt="{{ $item->title }}" id="image_preview">
    </div>

    <div class="custom-file">
      <input type="file" name="image" class="custom-file-input" id="image_edit">
      <label class="custom-file-label" for="image" id="custom-file-label">Pilih file..</label>
    </div>

    <div class="py-4">
      <a href="{{ route('admin.items.index') }}" class="btn btn-primary">Kembali</a>
      <button type="submit" class="btn btn-success" data-id="{{ $item->id }}" id="item_update_button">Simpan Perubahan</button>
    </div>

    </form>

  </div>
</div>
@endsection

@push('js')
<script>
  $(document).ready(function() {
    flatpickr("#date_of_added_edit", {});

    $('#item_update_button').click(function(e) {
      let id = $(this).data("id");
      let token = $("input[name=_token]").val();
      let item_number = $("#item_number_edit").val();
      let item_type_id = $("#item_type_id_edit").val();
      let title = $("#title_edit").val();
      let location = $("#location_edit").val();
      let date_of_added = $("#date_of_added_edit").val();
      let languages = $("#languages_edit").val();

      $.ajax({
        url: "{{ route('admin.items.update', $item->id) }}",
        type: "PUT",
        data: {
          id: id,
          _token: token,
          item_number: item_number,
          item_type_id: item_type_id,
          title: title,
          location: location,
          date_of_added: date_of_added,
          languages: languages
        },
        success: function(data) {
          Swal.fire({
            title: "Berhasil",
            text: "Data berhasil diubah.",
            icon: "success",
            timerProgressBar: true,
            onBeforeOpen: () => {
              Swal.showLoading();
              timerInterval = setInterval(() => {
                const content = Swal.getContent();
                if (content) {
                  const b = content.querySelector("b");
                  if (b) {
                    b.textContent = Swal.getTimerLeft();
                  }
                }
              }, 100);
            },
            showConfirmButton: false
          });
          setTimeout(function() {
            // location.reload();
          }, 500);
        },
        error: function(data) {
          Swal.fire("Gagal!", "Data gagal diubah.", "warning");
        }
      });
    })

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $("#custom-file-label").html(input.files[0].name);
          $('#image_preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
    $("#image_edit").change(function() {
      readURL(this);
    });
  });
</script>
@endpush