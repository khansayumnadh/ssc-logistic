<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="create-item-modal" data-backdrop="static" tabindex="-1" role="dialog"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.items.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="title">Nama Barang</label>
                <input type="text" class="form-control" name="title" id="title_create"
                  placeholder="Masukkan nama barang..">
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="item_type_id">Tipe Barang</label>
                <select class="form-control" name="item_type_id" id="item_type_id_create" style="width: 100%;">
                  <option selected>Pilih Tipe Barang</option>
                  @foreach($item_types as $item_type)
                  <option value="{{ $item_type->id }}">{{ $item_type->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="location">Lokasi</label>
                <input type="text" class="form-control" name="location" id="location_create"
                  placeholder="Masukkan lokasi..">
              </div>
            </div>

            <div class="col-lg-6">
              <label for="date_of_added">Tanggal Ditambahkan</label>
              <div class="input-group">
                <input type="date" class="form-control" name="date_of_added" id="date_of_added_create"
                  placeholder="Pilih tanggal ditambahkan..">
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2"><i class="far fa-calendar-alt"></i></span>
                </div>
              </div>
            </div>

          </div>

          <!-- <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label for="title">Bahasa</label>
                <input type="text" class="form-control" name="languages" id="languages_create"
                  placeholder="Masukkan bahasa..">
              </div>
            </div>
          </div> -->

          <div class="row">
            <div class="col-lg-6">
              <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" id="image_create">
                <label class="custom-file-label" for="image" id="custom-file-label">Pilih file..</label>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="text-center">
                <img src="" class="img img-thumbnail shadow" alt="" id="image_preview" height="100" width="100">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" id="create-item-button">Tambah Barang</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>