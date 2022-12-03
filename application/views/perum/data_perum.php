<div class="faq">
    <div class="" data-aos="fade-up">
        <div class="row">
            <div class="accordion accordion-flush" id="faqlist">
                <table class="table">
                    <thead class="table__thead">
                        <tr>
                            <th class="table__th">PERUMAHAN</th>
                            <th class="table__th">ALAMAT</th>
                            <th class="table__th">LOGO</th>
                        </tr>
                    </thead>
                    <tbody class="table__tbody">
                        <?php
                        foreach ($data_perum as $data) :
                        ?>
                            <tr class="table-row table-row--chris">
                                <td class="table-row__td">
                                    <div class="table-row__img">
                                        <img src="<?php echo base_url('upload'); ?>/<?php echo $data->logo; ?>" class="img-fluid" alt="">
                                    </div>
                                    <div class="table-row__info">
                                        <p class="table-row__name"><?php echo $data->nm_perum; ?></p>
                                    </div>
                                </td>
                                <td class="table-row__td">
                                    <?php echo $data->alamat; ?>
                                </td>
                                <td class="row-td-action">
                                    <a href="#" class="btn-edit" data-id-perum="<?php echo $data->id_perum; ?>" data-nm-perum="<?php echo $data->nm_perum; ?>" data-alamat="<?php echo $data->alamat; ?>" data-url-map="<?php echo $data->url_map; ?>" data-map="<?php echo $data->map; ?>" data-deskripsi="<?php echo $data->deskripsi; ?>" data-logo="<?php echo $data->logo; ?>">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <a href="#" class="btn-delete">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
                <input type="text" id="id-perum" value="" hidden>
            </div>
        </div>
    </div>
</div>
<script>
    $('.btn-edit').click(function(e) {
        $('#herf-batal, #ceklis-ubah-logo').removeAttr('hidden', true);
        $('.btn-simpan-perum').val('edit');
        $('#id-perum').val($(this).data('id-perum'));
        $('#nm-perum').val($(this).data('nm-perum'));
        $('#alamat').val($(this).data('alamat'));
        $('#url-map').val($(this).data('url-map'));
        $('#map').val($(this).data('map'));
        $('#deskripsi').val($(this).data('deskripsi'));
        $('#logo').val($(this).data('logo'));
        $('#logo-lama').val($(this).data('logo'));
        $('#preview-foto-logo').attr({
            src: '<?php echo base_url('upload'); ?>/' + $(this).data('logo')
        });
    });
</script>