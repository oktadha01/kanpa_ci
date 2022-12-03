<script>
    $(document).ready(function() {
        load_data_perum();
    });

    $('.btn-simpan-perum').click(function(e) {
        var action = $('.btn-simpan-perum').val();
        const logo = $('#file-foto-logo').prop('files')[0];
        let formData = new FormData();
        formData.append('id-perum', $('#id-perum').val());
        formData.append('nm-perum', $('#nm-perum').val());
        formData.append('alamat', $('#alamat').val());
        formData.append('url-map', $('#url-map').val());
        formData.append('map', $('#map').val());
        formData.append('logo', logo);
        formData.append('deskripsi', $('#deskripsi').val());
        formData.append('ubah-logo', $('#ceklis-ubah-foto-logo').val());
        formData.append('logo-lama', $('#logo-lama').val());
        if (action == 'simpan') {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('perum/simpan_perum'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    alert('berhasil')
                    form_default();
                    load_data_perum();
                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        } else if (action == 'edit') {
            var id_perum = $('#id-perum').val();
            alert(id_perum);
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('perum/edit_perum'); ?>",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    form_default();
                    load_data_perum()

                },
                error: function() {
                    alert("Data Gagal Diupload");
                }
            });
        }
    });
    $('.btn-batal-perum').click(function(e) {

        form_default()
    });
    $('#ceklis-ubah-foto-logo').click(function(e) {
        if ($(this).is(":checked")) {
            $('#ceklis-ubah-foto-logo').val('change-logo');
        } else {
            $('#ceklis-ubah-foto-logo').val('');
        }
    });

    function form_default() {
        $('.btn-simpan-perum').val('simpan');
        $('#id-perum').val('');
        $('#nm-perum').val('');
        $('#alamat').val('');
        $('#url-map').val('');
        $('#map').val('');
        $('#deskripsi').val('');
        $('#preview-foto-logo').attr({
            src: ''
        });
        $('#ceklis-ubah-foto-logo').prop('checked', false);
        $('#herf-batal , #ceklis-ubah-logo').attr('hidden', true);
    }
    $('#file-foto-logo').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#nm-foto-logo").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview-foto-logo").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
    $(document).on("click", ".pilih-foto", function() {
        var file = $(this).parents().find(".file-logo");
        file.trigger("click");
    });

    function load_data_perum() {
        $.ajax({
            // type: 'POST',
            url: "<?php echo site_url('perum/data_perum'); ?>",
            // data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#data-perum').html(data);

            },
            error: function() {
                alert("Data Gagal Diupload");
            }
        });
    }
</script>