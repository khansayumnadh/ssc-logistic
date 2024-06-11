<script>
  $(document).ready(function() {
    flatpickr("#date_start_create", {});
    flatpickr("#date_end_create", {});

    $("#item_borrowers_history_create_modal").submit(function(e) {
      e.preventDefault();
      let token = $("input[name=_token]").val();
      let user_id = $("#user_id_create").val();
      let item_id = $("#item_id_create").val();
      let date_start = $("#date_start_create").val();
      let date_end = $("#date_end_create").val();
      let notes = $("#notes_create").val();

      $.ajax({
        url: "{{ route('mahasiswa.json-item-borrowers.store') }}",
        type: "POST",
        data: {
          _token: token,
          user_id: user_id,
          item_id: item_id,
          date_start: date_start,
          date_end: date_end,
          notes: notes
        },
        success: function(data) {
          Swal.fire({
            title: "Berhasil",
            text: "Data berhasil ditambahkan.",
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
          }, 500)
        },
        error: function(data) {
          Swal.fire("Gagal!", "Data gagal ditambahkan.", "warning");
        }
      });
    });
  });
</script>