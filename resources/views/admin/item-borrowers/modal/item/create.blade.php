<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="create-item-borrower-modal" data-backdrop="static" tabindex="-1"
  role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Peminjam Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.item-borrowers.store') }}" method="POST" id="item_borrower_form">
          @csrf
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label for="user_id">Pengguna</label>
                <select class="form-control" name="user_id" id="user_id_create" style="width: 100%;">
                  <option selected>Pilih Pengguna</option>
                  @foreach($users as $user)
                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-group">
                <label for="item_id">Barang</label>
                <select class="form-control" name="item_id" id="item_id_create" style="width: 100%;">
                  <option selected>Pilih Barang</option>
                  @foreach($items as $item)
                  <option value="{{ $item->id }}">{{ $item->title }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <label for="date_start">Dari Tanggal</label>
              <div class="input-group">
                <input type="date" class="form-control" name="date_start" id="date_start_create"
                  placeholder="Pilih tanggal mulai..">
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2"><i class="far fa-calendar-alt"></i></span>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <label for="date_end">Sampai Tanggal</label>
              <div class="input-group">
                <input type="date" class="form-control" name="date_end" id="date_end_create"
                  placeholder="Pilih tanggal akhir..">
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2"><i class="far fa-calendar-alt"></i></span>
                </div>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-lg-12 pt-3">
              <div class="form-group">
                <label for="notes">Keterangan</label>
                <textarea class="form-control" name="notes" id="notes_create" rows="3"
                  placeholder="Masukkan keterangan.. (opsional)" style="height: 100px"></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" id="create-item-borrower-button">Tambah Data Peminjam
                Barang</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>