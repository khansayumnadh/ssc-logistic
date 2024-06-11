@extends('layouts.stisla.index', ['title' => 'Detail Histori ' . $item_user->user->name, 'section_header' => 'Detail Histori ' . $item_user->user->name])

@section('content')
<div class="row">
  <div class="col-lg-7">
    <div class="card">
      <form action="" method="POST" class="item_borrower_form">
        @csrf
        @method('PUT')
        <table class="table">
          <tr>
            <td style="width: 145px;">Peminjam</td>
            <td style="width: 10px;">:</td>
            <td class="text-wrap"><button type="button" class="btn btn-info" data-toggle="modal" data-id="{{ $item_user->user->id }}" data-target="#user-detail-show-modal" id="user-swal-show-button">{{ $item_user->user->name }}</button></td>
          </tr>
          <tr>
            <td>Nama Barang</td>
            <td>:</td>
            <td>
              <button type="button" class="btn btn-info" data-toggle="modal" data-id="{{ $item_user->item->id }}" data-target="#item-detail-show-modal" id="item-swal-show-button">{{ $item_user->item->title }}</button>
            </td>
          </tr>
          <tr>
            <td>Dari Tanggal</td>
            <td>:</td>
            <td class="text-wrap">{{ $item_user->date_start }}</td>
          </tr>
          <tr>
            <td>Sampai Tanggal</td>
            <td>:</td>
            <td class="text-wrap">{{ $item_user->date_end }}</td>
          </tr>
          <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td class="text-wrap">{{ $item_user->notes }}</td>
          </tr>
          <tr>
            <td>Status</td>
            <td>:</td>
            @if($item_user->status === 1)
            <td class="text-success text-wrap">Disetujui</td>
            @elseif($item_user->status === 2)
            <td class="text-warning text-wrap">Menunggu</td>
            @else
            <td class="text-danger text-wrap">Tidak disetujui</td>
            @endif
          </tr>
        </table>
    </div>
  </div>

  <div class="col-lg-5">
    <div class="card">
      <img src="{{ asset($item_user->item->image) }}" class="img-thumbnail" alt="{{ $item_user->item->name }}">
    </div>
    <div class="py-4">
      <a href="{{ route('mahasiswa.item-borrowers-history.index') }}" class="btn btn-primary">Kembali</a>
    </div>
    </form>
  </div>
</div>
@endsection

@push('modal')
@include('admin.item-borrowers-history.modal.user.show')
@include('admin.item-borrowers-history.modal.item.show')
@endpush

@push('js') <script>
  $(document).ready(function() {
    $("#item-swal-show-button").click(function() {
      let id = $(this).data("id");
      let token = $("input[name=_token]").val();

      $.ajax({
        url: "{{ route('admin.json-item.show', $item_user->item->id) }}",
        type: "GET",
        data: {
          id: id,
          _token: token
        },
        success: function(data) {
          let image = data.data.image;
          let title = data.data.title;
          let item_number = data.data.item_number;
          let location = data.data.location;
          let item_type_name = data.data.item_type_name;
          let date_of_added = data.data.date_of_added;
          let url = "{{ asset('') }}";

          $("#image_detail_show").attr("src", url + image);
          $("#title_detail_show").html(title);
          $("#item_number_detail_show").html(item_number);
          $("#location_detail_show").html(location);
          $("#item_type_id_detail_show").html(item_type_name);
          $("#date_of_added_detail_show").html(date_of_added);
        },
        error: function(data) {
          Swal.fire("Gagal!", "Tidak dapat melihat info barang.", "warning");
        }
      });

    });

    $("#item-approved-button").click(function(e) {
      e.preventDefault();
      Swal.fire({
        title: 'Setuju?',
        text: "Data peminjaman akan disetujui.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.value) {
          let id = $(this).data("id");
          let token = $("input[name=_token]").val();

          $.ajax({
            url: "{{ route('admin.json-item.approved', $item_user->id) }}",
            type: "PUT",
            data: {
              id: id,
              _token: token
            },
            success: function(data) {
              Swal.fire({
                title: "Berhasil",
                text: "Berhasil menyetujui peminjaman.",
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
                location.reload();
              }, 800);
            },
            error: function(data) {
              Swal.fire("Gagal!", "Gagal.", "warning");
            }
          })

        }
      })

    });

    $("#item-not-approved-button").click(function(e) {
      e.preventDefault();
      Swal.fire({
        title: 'Tidak menyetujui?',
        text: "Data peminjaman tidak akan disetujui.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.value) {
          let id = $(this).data("id");
          let token = $("input[name=_token]").val();

          $.ajax({
            url: "{{ route('admin.json-item.not-approved', $item_user->id) }}",
            type: "PUT",
            data: {
              id: id,
              _token: token
            },
            success: function(data) {
              Swal.fire({
                title: "Berhasil",
                text: "Berhasil tidak menyetujui peminjaman.",
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
                location.reload();
              }, 800);
            },
            error: function(data) {
              Swal.fire("Gagal!", "Gagal.", "warning");
            }
          })

        }
      })
    });




    $("#user-swal-show-button").click(function() {
      let id = $(this).data("id");
      let token = $("input[name=_token]").val();

      $.ajax({
        url: "{{ route('admin.json-user.show', $item_user->user->id) }}",
        type: "GET",
        data: {
          id: id,
          _token: token
        },
        success: function(data) {
          let image = data.data.image;
          let user_number = data.data.user_number;
          let name = data.data.name;
          let role_type_name = data.data.role_type_name;
          let email = data.data.email;
          let address = data.data.address;
          let url = "{{ asset('') }}";

          $("#image_detail_show").attr("src", url + image);
          $("#user_number_detail_show").html(user_number);
          $("#name_detail_show").html(name);
          $("#role_id_detail_show").html(role_type_name);
          $("#email_detail_show").html(email);
          $("#address_detail_show").html(address);
        },
        error: function(data) {
          console.log(0);
          console.log(data);
        }
      });
    });
  });
</script>
@endpush