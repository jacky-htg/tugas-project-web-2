<?= $this->extend('layouts/page_layout') ?>
<?= $this->section('content') ?>
    <div class="right_col" role="main" style="min-height: 3790px;">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Taruna</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <?= validation_list_errors() ?>

                            <?= form_open_multipart("taruna/{$taruna['id']}/update"); ?>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama">Nama <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="nama" name="nama" required="required" class="form-control " value="<?= set_value('nama')?set_value('nama'):$taruna['nama'] ?>" >
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nomer_taruna">nomer_taruna<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="nomer_taruna" name="nomer_taruna" required="required" class="form-control " value="<?= set_value('nomer_taruna')?set_value('nomer_taruna'):$taruna['nomer_taruna'] ?>" >
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tempat_lahir">tempat_lahir<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class='form-control col-lg-5 itemSearch' id="tempat_lahir" name="tempat_lahir" required="required" value="<?= set_value('tempat_lahir') ?>" >
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal_lahir">tanggal_lahir<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" required="required" class="form-control " value="<?= set_value('tanggal_lahir')?set_value('tanggal_lahir'):$taruna['tanggal_lahir'] ?>" >
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="program_studi">program_studi<span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class='form-control col-lg-5 itemSearch' id="program_studi" name="program_studi" required="required" value="<?= set_value('program_studi') ?>" ></select>
                                </div>
                            </div>

                            <?php if (!empty($taruna['foto'])) :?>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="cur_foto">Current Foto</label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <img height="150px" src="<?= base_url('images');?>/<?= $taruna['foto'] ?>" >
                                    </div>
                                </div>
                            <?php endif;?>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="foto">Ubah Foto</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" id="foto" name="foto" class="form-control " value="<?= set_value('foto')?set_value('foto'):$taruna['foto'] ?>" >
                                </div>
                            </div>

                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('vendors');?>/select2/dist/js/select2.min.js"></script>
    <script>
        $(document).ready( function () {
            $("#tempat_lahir").select2({
                allowClear: true,
                data:[{id: "<?= $taruna['kota_id'];?>", text: "<?= $taruna['tempat_lahir'];?>"}],
                minimumInputLength: 2,
                tags: [],
                ajax: {
                    url: "<?= base_url('api/kota/lookup');?>",
                    dataType: 'json',
                    type: "GET",
                    quietMillis: 50,
                    data: function (term) {
                        return {
                            term: term
                        };
                    },
                    results: function (data) {
                        return { results: data };
                    }
                }
            });
            $('#tempat_lahir').val("<?= $taruna['kota_id'];?>").trigger('change');

            $("#program_studi").select2({
                allowClear: true,
                data:[{id: "<?= $taruna['program_studi_id'];?>", text: "<?= $taruna['program_studi'];?>"}],
                minimumInputLength: 2,
                tags: [],
                ajax: {
                    url: "<?= base_url('api/programstudi/lookup');?>",
                    dataType: 'json',
                    type: "GET",
                    quietMillis: 50,
                    data: function (term) {
                        return {
                            term: term
                        };
                    },
                    results: function (data) {
                        return { results: data };
                    }
                }
            });
            $('#program_studi').val("<?= $taruna['program_studi_id'];?>").trigger('change');
        });
    </script>
<?= $this->endSection() ?>