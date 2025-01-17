<script>
    $(document).ready(function() {

        $('#item-types-create-button').click(function(e) {
            Swal.fire({
                title: "Proses",
                text: "Sedang melakukan proses..",
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
        });

        $(".item-types-swal-show-button").click(function() {
            let id = $(this).data("id");

            let url = "{{ route('api.item-type.show', 'id') }}";
            url = url.replace('id', id);

            $.ajax({
                url: url,
                success: function(response) {
                    $("#item_types_name_show").html(response.data.name);
                    $("#item_types_description_show").html(response.data.description);
                },
                error: function(data) {
                    Swal.fire("Gagal!", "Tidak dapat melihat info kategori buku.", "warning");
                }
            });
        });

        $(".item-types-swal-edit-button").click(function() {
            let id = $(this).data("id");

            let url = "{{ route('api.item-type.show', 'id') }}";
            let updateUrl = "{{ route('admin.item-types.update', 'id') }}";

            url = url.replace('id', id);
            updateUrl = updateUrl.replace('id', id);

            $.ajax({
                url: url,
                success: function(response) {
                    $('#item-types-edit-modal #edit-form').attr('action', updateUrl);

                    $("#name_edit").val(response.data.name);
                    $("#description_edit").val(response.data.description);
                },
                error: function(data) {
                    Swal.fire("Gagal!", "Tidak dapat melihat info kategori buku.", "warning");
                }
            });
        });

        $('#item-types-swal-update-button').click(function() {
            Swal.fire({
                title: "Proses",
                text: "Sedang melakukan proses..",
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
        });

        $(".item-types-swal-delete-button").click(function(e) {
            e.preventDefault();
            
            Swal.fire({
                title: "Hapus?",
                text: "Data tidak akan bisa dikembalikan.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Batal"
            }).then(result => {
                if (result.value) {
                    Swal.fire({
                        title: "Proses",
                        text: "Sedang melakukan proses..",
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

                    $(this).parent().submit();
                }
            });
        });
    })
</script>